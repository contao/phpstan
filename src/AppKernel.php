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

class AppKernel extends \Contao\CoreBundle\Tests\Functional\app\AppKernel
{
    public function dumpContainer(ConfigCache $cache, ContainerBuilder $container, $class, $baseClass): void
    {
        parent::dumpContainer($cache, $container, $class, $baseClass);

        $filesystem = new \Symfony\Component\Filesystem\Filesystem();

        $filesystem->dumpFile(
            $this->getCacheDir().'/appDevPHPStanProjectContainer.xml',
            (new XmlDumper($container))->dump()
        );
    }
}
