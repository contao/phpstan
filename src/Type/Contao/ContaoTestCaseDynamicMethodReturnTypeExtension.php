<?php

declare(strict_types=1);

namespace Oneup\PHPStan\Type\Contao;

use Contao\TestCase\ContaoTestCase;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Name;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\IntersectionType;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;
use PHPUnit\Framework\MockObject\MockObject;

class ContaoTestCaseDynamicMethodReturnTypeExtension implements DynamicMethodReturnTypeExtension
{
    public function getClass(): string
    {
        return ContaoTestCase::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return 'mockClassWithProperties' === $methodReflection->getName();
    }

    public function getTypeFromMethodCall(MethodReflection $methodReflection, MethodCall $methodCall, Scope $scope): Type
    {
        /** @var Arg $argument */
        foreach ($methodCall->args as $argument) {
            $value = $argument->value;

            if ($value instanceof ClassConstFetch && $value->class instanceof Name) {
                // see https://medium.com/@ondrejmirtes/union-types-vs-intersection-types-fd44a8eacbb
                return new IntersectionType([
                    new ObjectType((string) $value->class),
                    new ObjectType(MockObject::class),
                ]);
            }
        }

        $arg = $methodCall->args[0]->value;

        return $scope->getType($arg);
    }
}
