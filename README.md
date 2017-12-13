Doctrine PostgreSQL 94 Platform Service Provider
------------------------------------------------

Install
-------

```
composer require sergiors/doctrine-cache-service-provider
```

How to use
----------
```php
use Pimple\Container;
use Silex\Provider\DoctrineServiceProvider;
use Sergiors\Pimple\Provider\DoctrinePostgreSQL94PlatformServiceProvider;

$container = new Container;
$container->register(new DoctrineServiceProvider);
$container->register(new DoctrinePostgreSQL94PlatformServiceProvider);
```

License
-------
MIT
