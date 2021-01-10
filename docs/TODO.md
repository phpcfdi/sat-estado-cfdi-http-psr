# phpcfdi/sat-estado-cfdi-soap Lista de tareas pendientes

## Pendientes

### Versión mínima de PHP

Incrementar la versión mínima de PHP a 7.4.

### Documentación de integraciones

Documentar cómo se puede integrar esta librería con una aplicación de framework o librería común.
  - [ ] Laravel
  - [ ] Symfony
  - [ ] Yii
  - [X] Guzzle (gracias @blacktrue)
  - [ ] HTTPPlug

### Dependencia de `sunrise/http-client-curl`

Sustituir `symfony/http-client` por `sunrise/http-client-curl` cuando sea compatible con PHP 8.0. 
Así estaba implementado, pero al menos en 2021-01-09 aún no era compatible.

## Hechas

### Primera versión estable

- Liberación de la primera versión mayor `1.x`.
- Soporte de PHP 8.0.
- Actualización de entorno de desarrollo e integración contínua.
