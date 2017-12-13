<?php

namespace Sergiors\Pimple\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Doctrine\DBAL\Types\Type;
use Sergiors\Pimple\Doctrine\DBAL\Platforms\PostgreSQL94ContribPlatform;
use Sergiors\Pimple\Doctrine\DBAL\Types\JsonbType;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
final class DoctrinePostgreSQL94PlatformServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        if (!isset($container['db'])) {
            throw new \LogicException(
                'You must register the DoctrineServiceProvider to use the DoctrinePostgreSQL94PlatformServiceProvider.'
            );
        }

        $container['db.options'] = array_merge($container['db.options'] ?? [], [
            'platform' => new PostgreSQL94ContribPlatform(),
        ]);

        try {
            Type::addType(JsonbType::JSONB, JsonbType::class);
        } catch (\Throwable $e) {
        }
    }
}
