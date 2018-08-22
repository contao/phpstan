<?php

declare(strict_types=1);

namespace Contao\PhpStan\Type;

use PHPStan\Reflection\MethodReflection;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class ContainerAwareInterfaceDynamicMethodReturnTypeExtension extends AbstractDynamicMethodReturnTypeFromServiceHelperExtension
{
    public function getClass(): string
    {
        return ContainerAwareInterface::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return 'get' === $methodReflection->getName();
    }
}
