<?php

namespace Sergiors\Pimple\Tests\Provider;

use Pimple\Container;
use PHPUnit\Framework\TestCase;
use Sergiors\Pimple\Provider\DoctrinePostgreSQL94PlatformServiceProvider;
use Sergiors\Pimple\Doctrine\DBAL\Platforms\PostgreSQL94ContribPlatform;


final class DoctrinePostgreSQL94PlatformServiceProviderTest extends TestCase
{
    /**
     * @test
     */
    public function register()
    {
        $container = new Container();
        $container['db'] = function () {};
        $container['db.options'] = [];

        $container->register(new DoctrinePostgreSQL94PlatformServiceProvider());

        $this->assertInstanceOf(
            PostgreSQL94ContribPlatform::class,
            $container['db.options']['platform']
        );
    }
}
