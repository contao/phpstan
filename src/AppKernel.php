<?php

declare(strict_types=1);

/*
 * This file is part of the Contao extension for PHPStan.
 *
 * (c) David Greminger
 *
 * @license MIT
 */

namespace Contao\PhpStan;

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\XmlDumper;
use Symfony\Component\Filesystem\Filesystem;

class AppKernel extends \Contao\CoreBundle\Tests\Functional\app\AppKernel
{
    public function dumpContainer(ConfigCache $cache, ContainerBuilder $container, $class, $baseClass): void
    {
        parent::dumpContainer($cache, $container, $class, $baseClass);

        $filesystem = new Filesystem();

        $filesystem->dumpFile(
            $this->getCacheDir().'/appTestDebugProjectContainer.xml',
            (new XmlDumper($container))->dump()
        );
    }
}
