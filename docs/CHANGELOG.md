# CHANGELOG

## Acerca de SemVer

Usamos [Versionado Semántico 2.0.0](SEMVER.md) por lo que puedes usar esta librería sin temor a romper tu aplicación.

## Cambios no liberados en una versión

Pueden aparecer cambios no liberados que se integran a la rama principal pero no ameritan una nueva liberación de
versión aunque sí su incorporación en la rama principal de trabajo, generalmente se tratan de cambios en el desarrollo.

## Listado de cambios

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
