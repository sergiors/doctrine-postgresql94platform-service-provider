<?php

namespace Sergiors\Silex\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Doctrine\DBAL\Types\Type;
use Sergiors\Silex\Doctrine\DBAL\Platforms\PostgreSQL94ContribPlatform;
use Sergiors\Silex\Doctrine\DBAL\Types\JsonbType;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
final class DoctrinePostgreSQL94PlatformServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        if (!isset($app['db'])) {
            throw new \LogicException(
                'You must register the DoctrineServiceProvider to use the DoctrinePostgreSQL94PlatformServiceProvider.'
            );
        }

        $app['db.options'] = array_merge($app['db.options'] ?? [], [
            'platform' => new PostgreSQL94ContribPlatform(),
        ]);

        try {
            Type::addType(JsonbType::JSONB, JsonbType::class);
        } catch (\Throwable $e) {
        }
    }
}
