<?php

declare(strict_types=1);

namespace Oneup\PHPStan\Type\Contao;

use Contao\TestCase\ContaoTestCase;
use PHPStan\Reflection\MethodReflection;

class ContaoTestCaseDynamicMethodReturnTypeExtension extends AbstractDynamicMethodReturnTypeFromMethodCallExtension
{
    public function getClass(): string
    {
        return ContaoTestCase::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return 'mockClassWithProperties' === $methodReflection->getName();
    }
}
