<?php

declare(strict_types=1);

namespace Oneup\PHPStan\Type\Contao;

use Contao\CoreBundle\Framework\ContaoFramework;
use PHPStan\Reflection\MethodReflection;

class ContaoFrameworkDynamicMethodReturnTypeExtension extends AbstractDynamicMethodReturnTypeFromMethodCallExtension
{
    public function getClass(): string
    {
        return ContaoFramework::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return 'createInstance' === $methodReflection->getName();
    }
}
