<?php

declare(strict_types=1);

namespace Oneup\PHPStan\Contao;

use PhpParser\Node\Expr;
use PHPStan\Analyser\Scope;
use PHPStan\Type\TypeUtils;
use Symfony\Component\Yaml\Yaml;

final class ServiceMap
{
    /**
     * @var Service[]
     */
    private $services;

    public function __construct(string $servicesYml)
    {
        /** @var Service[] $aliases */
        $aliases = [];

        $yml = Yaml::parseFile($servicesYml);

        if (\is_array($yml) && array_key_exists('services', $yml)) {
            $services = $yml['services'];

            foreach ($services as $serviceId => $parameters) {
                if (!array_key_exists('class', $parameters)) {
                    continue;
                }

                $service = new Service(
                    0 === strpos((string) $serviceId, '.') ? substr((string) $serviceId, 1) : (string) $serviceId,
                    isset($parameters['class']) ? (string) $parameters['class'] : null,
                    !isset($parameters['public']) || 'false' !== (string) $parameters['public'],
                    isset($parameters['synthetic']) && 'true' === (string) $parameters['synthetic'],
                    isset($parameters['alias']) ? (string) $parameters['alias'] : null,
                    0 === strpos((string) $serviceId, '.')
                );

                if (null !== $service->getAlias()) {
                    $aliases[] = $service;
                } else {
                    $this->services[$service->getId()] = $service;
                }
            }

            foreach ($aliases as $service) {
                $alias = $service->getAlias();
                if (null !== $alias && !array_key_exists($alias, $this->services)) {
                    continue;
                }

                $serviceId = $service->getId();

                $this->services[$serviceId] = new Service(
                    $serviceId,
                    $this->services[$alias]->getClass(),
                    $service->isPublic(),
                    $service->isSynthetic(),
                    $service->getAlias(),
                    $service->isHidden()
                );
            }
        }
    }

    public function getService(string $id): ?Service
    {
        return $this->services[$id] ?? null;
    }

    public static function getServiceIdFromNode(Expr $node, Scope $scope): ?string
    {
        $strings = TypeUtils::getConstantStrings($scope->getType($node));

        return 1 === \count($strings) ? $strings[0]->getValue() : null;
    }
}
