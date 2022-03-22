<?php

/*
 * This file is part of the PHP Translation package.
 *
 * (c) PHP Translation team <tobias.nyholm@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Translation\PlatformAdapter\Loco\Tests\Functional;

use Http\HttplugBundle\HttplugBundle;
use Nyholm\BundleTest\TestKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Translation\PlatformAdapter\Loco\Bridge\Symfony\TranslationAdapterLocoBundle;
use Translation\PlatformAdapter\Loco\Loco;

class BundleInitializationTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    public function testRegisterBundle(): void
    {
        $kernel = $this->createKernel();
        $kernel->addTestBundle(TranslationAdapterLocoBundle::class);
        $kernel->addTestBundle(HttplugBundle::class);

        $kernel->boot();
        $container = $kernel->getContainer();

        $this->assertTrue($container->has('php_translation.adapter.loco'));
        $service = $container->get('php_translation.adapter.loco');
        $this->assertInstanceOf(Loco::class, $service);
    }
}
