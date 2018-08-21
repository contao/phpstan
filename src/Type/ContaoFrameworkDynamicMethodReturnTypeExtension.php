<?php

declare(strict_types=1);

namespace Contao\PHPStan\Type;

use Contao\CoreBundle\Framework\ContaoFramework;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Name;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\MethodReflection;
use PHPStan\Type\DynamicMethodReturnTypeExtension;
use PHPStan\Type\ObjectType;
use PHPStan\Type\Type;

class ContaoFrameworkDynamicMethodReturnTypeExtension implements DynamicMethodReturnTypeExtension
{
    public function getClass(): string
    {
        return ContaoFramework::class;
    }

    public function isMethodSupported(MethodReflection $methodReflection): bool
    {
        return 'createInstance' === $methodReflection->getName();
    }

    public function getTypeFromMethodCall(MethodReflection $methodReflection, MethodCall $methodCall, Scope $scope): Type
    {
        /** @var Arg $argument */
        foreach ($methodCall->args as $argument) {
            $value = $argument->value;

            if ($value instanceof ClassConstFetch && $value->class instanceof Name) {
                return new ObjectType((string) $value->class);
            }
        }

        $arg = $methodCall->args[0]->value;

        return $scope->getType($arg);
    }
}
