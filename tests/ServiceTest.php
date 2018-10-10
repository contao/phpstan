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

use Contao\PhpStan\Service;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    /**
     * @var Service
     */
    private $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new Service('service.id', null, true, false, 'service.alias', false);
    }

    public function testCanBeInstantiated(): void
    {
        $this->assertInstanceOf('Contao\PhpStan\Service', $this->service);
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
