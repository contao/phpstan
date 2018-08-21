<?php

declare(strict_types=1);

namespace Contao\PHPStan\Tests;

use Contao\PHPStan\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    private $service;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        $this->service = new Service(
            'service.id',
            null,
            true,
            false,
            'service.alias',
            false
        );
    }

    public function testCanBeInstantiated(): void
    {
        $this->assertInstanceOf('Contao\PHPStan\Service', $this->service);
    }

    public function testReturnsValidId(): void
    {
        $this->assertSame('service.id', $this->service->getId());
    }

    public function testReturnsValidClass(): void
    {
        $this->assertNull($this->service->getClass());
    }

    public function testIsPublic(): void
    {
        $this->assertTrue($this->service->isPublic());
    }

    public function testIsSynthetic(): void
    {
        $this->assertFalse($this->service->isSynthetic());
    }

    public function testReturnsValidAlias(): void
    {
        $this->assertSame('service.alias', $this->service->getAlias());
    }

    public function testIsHidden(): void
    {
        $this->assertFalse($this->service->isHidden());
    }
}
