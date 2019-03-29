# Crear un consumer con guzzle

## Implementación HTTP Factory para Guzzle PSR7

```shell
composer require http-interop/http-factory-guzzle
```

## Guzzle HTTP Client Adapter 

```shell
composer require php-http/guzzle6-adapter
```

## Ejemplo básico de construcción

```php
<?php

use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerClient;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerFactory;

$streamFactory = new \Http\Factory\Guzzle\StreamFactory();
$requestFactory = new \Http\Factory\Guzzle\RequestFactory();
$client = new \Http\Adapter\Guzzle6\Client();

$factory = new HttpConsumerFactory($client, $requestFactory, $streamFactory);
$consumer = new HttpConsumerClient($factory);
```
