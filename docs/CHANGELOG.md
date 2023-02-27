# CHANGELOG

## Acerca de SemVer

Usamos [Versionado Semántico 2.0.0](SEMVER.md) por lo que puedes usar esta librería sin temor a romper tu aplicación.

## Cambios no liberados en una versión

Pueden aparecer cambios no liberados que se integran a la rama principal, pero no ameritan una nueva liberación de
versión, aunque sí su incorporación en la rama principal de trabajo. Generalmente, se tratan de cambios en el desarrollo.

### Mantenimiento 2023-02-27

Esta es una actualización de mantenimiento que no genera una nueva liberación de código.

- Se corrige la integración continua porque la librería `sunrise/http-factory` fue deprecada.
- Se actuailza a `sunrise/http-message:^3.0`.
- Se actualiza la documentación que hacía referencia a `sunrise/http-factory`.
- Se sustituye `symfony/http-client` por `sunrise/http-client-curl`. 
- Se actualiza el año en la licencia. ¡Feliz 2023!
- Se actualiza la configuración de estilo de código a la utilizada por otros proyectos de phpCfdi.
- Se corrige la insignia `badge-build`.
- Se corrige la liga al proyecto en la guía de contribución.
- En los flujos de trabajo de integración continua:
  - Se agrega PHP 8.2 a la matriz de pruebas
  - Se quitaPHP 7.3 de la matriz de pruebas porque no hay soporte para *Sunrise PHP*.
  - Los trabajos se ejecutan en PHP 8.2
  - Se actualizan las acciones de GitHub a la versión 3.
  - Se sustituye la directiva `::set-output` por `$GITHUB_OUTPUT`.
  - Se elimina la instalación de `composer` donde no es necesaria.
  - Se agrega el evento `workflow_dispatch`.
- Se actualizan las herramientas de desarrollo.

### Fix build 2022-03-08

Se corrige la integración continua porque PHPStan 1.4.8 no reconoce el tipo de elementos contenidos
en un objeto de tipo `DOMNodeList`.

En la integración continua la herramienta `phpcs` tenía fijos los directorios a escanear, ahora usa
los directorios establecidos en el archivo de configuración.

## Listado de cambios

### Version 1.0.3 2022-02-22

- Se actualiza el año en el archivo de licencia. Feliz 2022.
- Se corrige el grupo de mantenedores de phpCfdi.
- Se actualizan las dependencias de desarrollo.
- Se corrige el archivo de configuración de Psalm porque el atributo `totallyTyped` está deprecado.
- Se actualiza la dependencia de desarrollo `phpcfdi/cfdi-expresiones:^3.0`.
- Se deja de utilizar Scrutinizer CI. Gracias Scrutinizer CI.
- El flujo de integración continua se cambia de pasos a trabajos.
- Se agrega la integración con *sonarcloud*.

### Version 1.0.2 2021-11-04

- Se actualiza la dependencia `phpcfdi/sat-estado-cfdi:^1.0.2`.
- Se eliminan los archivos `tools/*` que estaban en el repositorio.
- Se corrigen los archivos ignorados para que incluya el directorio `tools`. 
- Se corrigen los archivos excluidos del paquete de distribución.

### Version 1.0.1 2021-09-03

- La versión menor de PHP es 7.3.
- Se actualiza PHPUnit a 9.5.
- Se migra de Travis-CI a GitHub Workflows. Gracias Travis-CI.
- Se instalan las herramientas de desarrollo usando `phive` en lugar de `composer`.
- Se agregan revisiones de `psalm` e `infection`.
- Se cambia la rama principal a `main`.

### Version 1.0.0 2021-01-10

- A partir de esta versión se ha puesto la documentación del proyecto en español.
- Se garatiza la compatibilidad con PHP 8.0.
- Dependencia con `phpcfdi/sat-estado-cfdi:^1.0.0`.

### Version 0.2.3 2021-01-09

- Update license year, HNY from PhpCfdi!
- Ensure compatibility to PHP 8.0.
- Upgrade to PHPStan 0.12.
- Remove PHPLint.
- Travis-CI: Update config, compatiblity matrix and build pipeline.
- Scrutinizer: Update build pipeline.
- Change dependency to `phpcfdi/sat-estado-cfdi: ^^0.7.0`.

### Version 0.2.2 2019-09-23

- Fix usage of `RequestInterface`, to retrieve full body is recommended to use `StreamInterface::__toString()`.
- Fix testing based on [`sunrise-php/http-client-curl`](https://github.com/sunrise-php/http-client-curl) because
  they changed their API from `1.0` to `1.1` and it broke object construction. Too late to report a SemVer issue.
- Improve `composer.json#support` section (PR #4)
- Package include `docs/` and exclude development file `.phplint.yml`
- Development:
    - Improve `composer dev:build` to include `dev:check-style`.
    - Write `.phpunit.result.cache` on `build/`.
    - On Travis CI add PHP version `7.4snapshot` with allow failure
    - Let Scrutinizer CI decide which PHP version to use
  
### Version 0.2.1 2019-05-16

- Change dependence versions `phpcfdi/sat-estado-cfdi: ^0.6.1|^0.7.0`.
  See <https://github.com/phpcfdi/sat-estado-cfdi/issues/7>
  
### Version 0.2.0 2019-03-29

- Implemented `phpcfdi/sat-estado-cfdi:^0.6.0`
- Improve documentation and integrations
- Fix CONTRIBUTING project

### Version 0.1.0 2019-03-28

- Implemented `phpcfdi/sat-estado-cfdi:^0.5.0`
