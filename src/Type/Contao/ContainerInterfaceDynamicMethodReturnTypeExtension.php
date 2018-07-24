<?php

declare(strict_types=1);

namespace Oneup\PHPStan\Type\Contao;

use PHPStan\Reflection\MethodReflection;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerInterfaceDynamicMethodReturnTypeExtension extends AbstractDynamicMethodReturnTypeExtension
{
    public function getClass(): string
    {
        return ContainerInterface::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return 'get' === $methodReflection->getName();
    }
}
