PHPStan Contao Framework extensions and rules
=============================================

* [PHPStan](https://github.com/phpstan/phpstan)

This extension provides following features:

* Provides correct return types for Contao services.

[![Author](https://img.shields.io/badge/author-@1upgmbh-blue.svg?style=flat-square)](https://twitter.com/1upgmbh)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Travis CI](https://travis-ci.org/1up-lab/phpstan-contao.svg?branch=master)](https://travis-ci.org/1up-lab/phpstan-contao)
[![Coverage Status](https://coveralls.io/repos/github/1up-lab/phpstan-contao/badge.svg?branch=master)](https://coveralls.io/github/1up-lab/phpstan-contao?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/oneup/phpstan-contao.svg?style=flat-square)](https://packagist.org/packages/oneup/phpstan-contao)

## Usage

To use this extension, require it in [Composer](https://getcomposer.org/):

```bash
composer require --dev oneup/phpstan-contao
```

And include extension.neon in your project's PHPStan config:

```
includes:
    - vendor/oneup/phpstan-contao/extension.neon
    - vendor/phpstan/phpstan-symfony/extension.neon

parameters:
    contao:
        services_yml_path: %currentWorkingDirectory%/src/Resources/config/services.yml

    symfony:
        container_xml_path: %currentWorkingDirectory%/vendor/oneup/phpstan-contao/var/cache/dev/appDevPHPStanProjectContainer.xml
```

## Limitations

You have to provide a path to `services.yml` or similar yml file describing your services.
