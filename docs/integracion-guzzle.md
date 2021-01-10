# Crear un consumer con guzzle

## Implementación HTTP Factory para Guzzle PSR7

```shell
composer require http-interop/http-factory-guzzle
```

## Guzzle HTTP Client Adapter 

```shell
composer require php-http/guzzle7-adapter
```

## Ejemplo básico de construcción

```php
<?php
declare(strict_types=1);

use Http\Adapter\Guzzle7\Client;
use Http\Factory\Guzzle\RequestFactory;
use Http\Factory\Guzzle\StreamFactory;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerClient;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerFactory;

$streamFactory = new StreamFactory();
$requestFactory = new RequestFactory();
$client = new Client();

$factory = new HttpConsumerFactory($client, $requestFactory, $streamFactory);
$consumer = new HttpConsumerClient($factory);
```
