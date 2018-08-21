<?php

declare(strict_types=1);

namespace Contao\PHPStan\Reflection;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;
use PHPStan\Reflection\PropertyReflection;

class BackendTemplateClassReflectionExtension implements PropertiesClassReflectionExtension
{
    public function hasProperty(ClassReflection $classReflection, string $propertyName): bool
    {
        return 'Contao\BackendTemplate' === $classReflection->getName() || $classReflection->isSubclassOf('Contao\BackendTemplate');
    }

    public function getProperty(ClassReflection $classReflection, string $propertyName): PropertyReflection
    {
        return new BackendTemplateReflection($classReflection);
    }
}
