<?php

declare(strict_types=1);

namespace Contao\PhpStan\Reflection;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertyReflection;
use PHPStan\Type\MixedType;
use PHPStan\Type\Type;

class BackendTemplateReflection implements PropertyReflection
{
    /** @var ClassReflection */
    private $declaringClass;

    public function __construct(ClassReflection $declaringClass)
    {
        $this->declaringClass = $declaringClass;
    }

    public function getDeclaringClass(): ClassReflection
    {
        return $this->declaringClass;
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function isPrivate(): bool
    {
        return false;
    }

    public function isPublic(): bool
    {
        return true;
    }

    public function getType(): Type
    {
        return new MixedType();
    }

    public function isReadable(): bool
    {
        return true;
    }

    public function isWritable(): bool
    {
        return true;
    }
}
