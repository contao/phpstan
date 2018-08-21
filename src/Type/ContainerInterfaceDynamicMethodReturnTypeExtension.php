<?php

declare(strict_types=1);

namespace Contao\PHPStan\Type;

use PHPStan\Reflection\MethodReflection;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerInterfaceDynamicMethodReturnTypeExtension extends AbstractDynamicMethodReturnTypeFromServiceHelperExtension
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
