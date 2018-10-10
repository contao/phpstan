<?php

declare(strict_types=1);

/*
 * This file is part of the Contao extension for PHPStan.
 *
 * (c) David Greminger
 *
 * @license MIT
 */

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
