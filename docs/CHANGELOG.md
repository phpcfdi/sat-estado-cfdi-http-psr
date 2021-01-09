# CHANGELOG

## Version 0.2.2 2019-09-23

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
  
## Version 0.2.1 2019-05-16

- Change dependence versions `phpcfdi/sat-estado-cfdi: ^0.6.1|^0.7.0`.
  See <https://github.com/phpcfdi/sat-estado-cfdi/issues/7>
  
## Version 0.2.0 2019-03-29

- Implemented `phpcfdi/sat-estado-cfdi:^0.6.0`
- Improve documentation and integrations
- Fix CONTRIBUTING project

## Version 0.1.0 2019-03-28

- Implemented `phpcfdi/sat-estado-cfdi:^0.5.0`
