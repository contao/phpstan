<?php

declare(strict_types=1);

namespace Oneup\PHPStan\Tests;

use Oneup\PHPStan\AppKernel;
use PHPUnit\Framework\TestCase;

class AppKernelTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $kernel = new AppKernel('dev', true);

        $this->assertInstanceOf('Oneup\PHPStan\AppKernel', $kernel);
    }
}
