<?php

declare(strict_types=1);

/*
 * This file is part of the Contao extension for PHPStan.
 *
 * (c) David Greminger
 *
 * @license MIT
 */

namespace Contao\PhpStan\Tests;

use Contao\PhpStan\ServiceHelper;
use PHPUnit\Framework\TestCase;

class ServiceHelperTest extends TestCase
{
    public function testEmptyServicesYml(): void
    {
        $serviceHelper = new ServiceHelper(__DIR__.'/Fixtures/empty_services.yml');

        $this->assertNull($serviceHelper->getService('foobar.id'));
    }
}
