# phpcfdi/sat-estado-cfdi-http-psr

[![Source Code][badge-source]][source]
[![Packagist PHP Version Support][badge-php-version]][php-version]
[![Discord][badge-discord]][discord]
[![Latest Version][badge-release]][release]
[![Software License][badge-license]][license]
[![Build Status][badge-build]][build]
[![Reliability][badge-reliability]][reliability]
[![Maintainability][badge-maintainability]][maintainability]
[![Code Coverage][badge-coverage]][coverage]
[![Violations][badge-violations]][violations]
[![Total Downloads][badge-downloads]][downloads]

> Consulta el estado de un CFDI en el webservice del SAT usando HTTP (PSR-17 y PSR-18)

:us: The documentation of this project is in spanish as this is the natural language for intended audience.

:mexico: La documentación del proyecto está en español porque ese es el lenguaje principal de los usuarios.

Esta librería contiene objetos para consumir el **Servicio de Consulta de CFDI del SAT** usando HTTP.

Esta librería provee un objeto **`HttpConsumerClient`** que se usa en `\PhpCfdi\SatEstadoCfdi\Consumer`
de la librería [`phpcfdi/sat-estado-cfdi`](https://github.com/phpcfdi/sat-estado-cfdi).

Para contactar al servicio **no requiere `ext-soap`** en su lugar usa los estándares de PHP-FIG
[PSR-18: HTTP Client](https://www.php-fig.org/psr/psr-18/) y [PSR-17: HTTP Factories](https://www.php-fig.org/psr/psr-17/).
De esta forma, puedes usar el cliente HTTP que mejor te convenga.

Los estándares de los que depende son:

- PSR-18: HTTP Client: Interfaces para clientes HTTP (el que hace la llamada POST).
  <https://www.php-fig.org/psr/psr-18/>
- PSR-17: HTTP Factories: Interfaces de fábricas de HTTP Request y Response (para PSR-7).
  <https://www.php-fig.org/psr/psr-17/>

Esta librería no contiene las implementaciones de los estándares, pero ya existen fuera del ámbito de la aplicación.

Te recomiendo probar las librerías de Sunrise
[`sunrise/http-client-curl`](https://github.com/sunrise-php/http-client-curl),
[`sunrise/http-factory`](https://github.com/sunrise-php/http-factory) y
[`sunrise/http-message`](https://github.com/sunrise-php/http-message).

O puedes ver en [Packagist](https://packagist.org/) los que te agraden:

  - PSR-18: <https://packagist.org/providers/psr/http-client-implementation>
  - PSR-17: <https://packagist.org/providers/psr/http-factory-implementation>
  - PSR-7: <https://packagist.org/providers/psr/http-message-implementation>

## Instalación

Usa [composer](https://getcomposer.org/)

```shell
composer require phpcfdi/sat-estado-cfdi-http-psr
```

## Ejemplo básico de uso

```php
<?php
declare(strict_types=1);

use PhpCfdi\SatEstadoCfdi\Consumer;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerClient;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerFactoryInterface;

// suponiendo que tienes un objeto factory que tu formaste
/** @var HttpConsumerFactoryInterface $factory */

// construimos el cliente
$client = new HttpConsumerClient($factory);

// creamos el consumidor con nuestro cliente
$consumer = new Consumer($client);

// consumimos el webservice!
$response = $consumer->execute('...expression');

// usamos el resultado
if ($response->cancellable()->isNotCancellable()) {
    echo 'CFDI no es cancelable';
}
```

## Integraciones

Puedes ver los siguientes recursos para integrar `phpcfdi/sat-estado-cfdi-http-psr` a tu proyecto.

- [Integración Guzzle](docs/integracion-guzzle.md)
  Implementación con [guzzlehttp/guzzle](https://github.com/guzzle/guzzle).
- [Integración genérica](docs/integracion-generica.md)
  Implementación de los PSR-17 y PSR-18 que decidas, ejemplo usando Sunrise.

## Compatibilidad

Esta librería se mantendrá compatible con al menos la versión con
[soporte activo de PHP](https://www.php.net/supported-versions.php) más reciente.

También utilizamos [Versionado Semántico 2.0.0](docs/SEMVER.md) por lo que puedes usar esta librería
sin temor a romper tu aplicación.

## Contribuciones

Las contribuciones con bienvenidas. Por favor lee [CONTRIBUTING][] para más detalles
y recuerda revisar el archivo de tareas pendientes [TODO][] y el archivo [CHANGELOG][].

## Copyright and License

The `phpcfdi/sat-estado-cfdi-http-psr` library is copyright © [PhpCfdi](https://www.phpcfdi.com/)
and licensed for use under the MIT License (MIT). Please see [LICENSE][] for more information.

[contributing]: https://github.com/phpcfdi/sat-estado-cfdi-http-psr/blob/main/CONTRIBUTING.md
[changelog]: https://github.com/phpcfdi/sat-estado-cfdi-http-psr/blob/main/docs/CHANGELOG.md
[todo]: https://github.com/phpcfdi/sat-estado-cfdi-http-psr/blob/main/docs/TODO.md

[source]: https://github.com/phpcfdi/sat-estado-cfdi-http-psr
[php-version]: https://packagist.org/packages/phpcfdi/sat-estado-cfdi-http-psr
[discord]: https://discord.gg/aFGYXvX
[release]: https://github.com/phpcfdi/sat-estado-cfdi-http-psr/releases
[license]: https://github.com/phpcfdi/sat-estado-cfdi-http-psr/blob/main/LICENSE
[build]: https://github.com/phpcfdi/sat-estado-cfdi-http-psr/actions/workflows/build.yml?query=branch:main
[reliability]:https://sonarcloud.io/component_measures?id=phpcfdi_sat-estado-cfdi-http-psr&metric=Reliability
[maintainability]: https://sonarcloud.io/component_measures?id=phpcfdi_sat-estado-cfdi-http-psr&metric=Maintainability
[coverage]: https://sonarcloud.io/component_measures?id=phpcfdi_sat-estado-cfdi-http-psr&metric=Coverage
[violations]: https://sonarcloud.io/project/issues?id=phpcfdi_sat-estado-cfdi-http-psr&resolved=false
[downloads]: https://packagist.org/packages/phpcfdi/sat-estado-cfdi-http-psr

[badge-source]: https://img.shields.io/badge/source-phpcfdi/sat--estado--cfdi--http--psr-blue?logo=github
[badge-discord]: https://img.shields.io/discord/459860554090283019?logo=discord
[badge-php-version]: https://img.shields.io/packagist/php-v/phpcfdi/sat-estado-cfdi-http-psr?logo=php
[badge-release]: https://img.shields.io/github/release/phpcfdi/sat-estado-cfdi-http-psr?logo=git
[badge-license]: https://img.shields.io/github/license/phpcfdi/sat-estado-cfdi-http-psr?logo=open-source-initiative
[badge-build]: https://img.shields.io/github/workflow/status/phpcfdi/sat-estado-cfdi-http-psr/build/main?logo=github-actions
[badge-reliability]: https://sonarcloud.io/api/project_badges/measure?project=phpcfdi_sat-estado-cfdi-http-psr&metric=reliability_rating
[badge-maintainability]: https://sonarcloud.io/api/project_badges/measure?project=phpcfdi_sat-estado-cfdi-http-psr&metric=sqale_rating
[badge-coverage]: https://img.shields.io/sonar/coverage/phpcfdi_sat-estado-cfdi-http-psr/main?logo=sonarcloud&server=https%3A%2F%2Fsonarcloud.io
[badge-violations]: https://img.shields.io/sonar/violations/phpcfdi_sat-estado-cfdi-http-psr/main?format=long&logo=sonarcloud&server=https%3A%2F%2Fsonarcloud.io
[badge-downloads]: https://img.shields.io/packagist/dt/phpcfdi/sat-estado-cfdi-http-psr?logo=packagist
