# Integrando esta librería a tu sistema

## Usando HttpConsumerFactory

Suponiendo que en tu aplicación ya estás utilizando algún cliente con soporte PSR-17 y PSR-18.

Suponiendo que estás usando los paquetes de Sunrise

```php
<?php
declare(strict_types=1);

use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerClient;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerFactory;
use Sunrise\Http\Factory\RequestFactory;
use Sunrise\Http\Factory\ResponseFactory;
use Sunrise\Http\Factory\StreamFactory;
use Sunrise\Http\Client\Curl\Client;

$streamFactory = new StreamFactory();
$requestFactory = new RequestFactory();
$responseFactory = new ResponseFactory();
$client = new Client($responseFactory, $streamFactory);

// use the current HttpConsumerFactory with specific objects

$factory = new HttpConsumerFactory($client, $requestFactory, $streamFactory);

// create client
$consumer = new HttpConsumerClient($factory);

```

## Extendiendo HttpConsumerFactory

Otra forma de hacerlo es extendiendo la clase `HttpConsumerFactory`, un ejemplo de esto se puede ver
en <https://github.com/phpcfdi/sat-estado-cfdi-http-psr/blob/main/tests/TestingHttpConsumerFactory.php>


## Implementando HttpConsumerFactoryInterface

Otra forma de hacerlo sería creando una clase que solamente extendiera `HttpConsumerFactoryInterface`.
Pues el objeto `HttpConsumerClient` requiere en su contructor de un objeto que cumpla con dicha interface.
