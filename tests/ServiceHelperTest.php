<?php

declare(strict_types=1);

namespace Contao\PHPStan\Tests;

use Contao\PHPStan\ServiceHelper;
use PHPUnit\Framework\TestCase;

class ServiceHelperTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $serviceHelper = new ServiceHelper(__DIR__.'/Resources/config/empty_services.yml');

        $this->assertInstanceOf('Contao\PHPStan\ServiceHelper', $serviceHelper);
    }

    public function testEmptyServicesYml(): void
    {
        $serviceHelper = new ServiceHelper(__DIR__.'/Resources/config/empty_services.yml');

        $this->assertNull($serviceHelper->getService('foobar.id'));
    }
}
