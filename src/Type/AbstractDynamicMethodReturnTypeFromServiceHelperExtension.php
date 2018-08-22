<?php

declare(strict_types=1);

namespace Contao\PhpStan\Type;

use Contao\PhpStan\Service;
use Contao\PhpStan\ServiceHelper;
use PhpParser\Node\Expr\MethodCall;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;

abstract class AbstractDynamicMethodReturnTypeFromServiceHelperExtension implements DynamicMethodReturnTypeExtension
{
    /**
     * @var ServiceHelper
     */
    protected $serviceHelper;

    public function __construct(ServiceHelper $contaoServiceHelper)
    {
        $this->serviceHelper = $contaoServiceHelper;
    }

    public function getTypeFromMethodCall(MethodReflection $methodReflection, MethodCall $methodCall, Scope $scope): Type
    {
        if (0 === \count($methodCall->args)) {
            return \PHPStan\Reflection\ParametersAcceptorSelector::selectFromArgs(
                $scope,
                $methodCall->args,
                $methodReflection->getVariants()
            )->getReturnType();
        }

        $serviceId = ServiceHelper::getServiceIdFromNode($methodCall->args[0]->value, $scope);

        if (null !== $serviceId) {
            $service = $this->serviceHelper->getService($serviceId);

            if ($service instanceof Service && \is_string($service->getClass())) {
                return new ObjectType($service->getClass());
            }
        }

        $arg = $methodCall->args[0]->value;

        return $scope->getType($arg);
    }
}
