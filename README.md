# phone-number

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.0-8892BF.svg)](https://php.net/)

# Description
 - Provides a service to validate phone numbers against international standards i.e. E164.

# Install
`composer require valantic-spryker-eco/phone-number`

# HowTos Cli

PHP Container: `docker run -it --rm --name my-running-script -v "$PWD":/data spryker/php:latest bash`

Run Tests: `vendor/bin/codecept run --env standalone`

Fixer: `vendor/bin/phpcbf --standard=phpcs.xml --report=full src/ValanticSpryker/`

Disable opcache: `mv /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.iniold`

XDEBUG:
- `ip addr | grep '192.'`
- `$docker-php-ext-enable xdebug`
- configure phpstorm (add 127.0.0.1 phpstorm server with name valantic)
- `$PHP_IDE_CONFIG=serverName=valantic php -dxdebug.mode=debug -dxdebug.client_host=192.168.87.39 -dxdebug.start_with_request=yes ./vendor/bin/codecept run --env standalone`

- Run Tests with coverage: `XDEBUG_MODE=coverage vendor/bin/codecept run --env standalone --coverage --coverage-xml --coverage-html`

# use nodejs
 - docker run -it --rm --name my-running-script -v "$PWD":/data node:18 bash
