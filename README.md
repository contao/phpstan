PHPStan Contao Framework extensions and rules
=============================================

* [PHPStan](https://github.com/phpstan/phpstan)

This extension provides following features:

* Provides correct return types for Contao services.

[![](https://img.shields.io/travis/contao/phpstan/master.svg?style=flat-square)](https://travis-ci.org/contao/phpstan/)
[![](https://img.shields.io/coveralls/contao/phpstan/master.svg?style=flat-square)](https://coveralls.io/github/contao/phpstan)
[![](https://img.shields.io/packagist/v/contao/phpstan.svg?style=flat-square)](https://packagist.org/packages/contao/phpstan)
[![](https://img.shields.io/packagist/dt/contao/phpstan.svg?style=flat-square)](https://packagist.org/packages/contao/phpstan)


## Usage

To use this extension, require it in [Composer](https://getcomposer.org/):

```bash
composer require --dev contao/phpstan
```

And include extension.neon in your project's PHPStan config:

```
includes:
    - vendor/contao/phpstan/extension.neon
    - vendor/phpstan/phpstan-symfony/extension.neon

parameters:
    contao:
        services_yml_path: %currentWorkingDirectory%/src/Resources/config/services.yml

    symfony:
        container_xml_path: %currentWorkingDirectory%/vendor/contao/phpstan/var/cache/dev/appDevPHPStanProjectContainer.xml
```

## Limitations

You have to provide a path to `services.yml` or similar yml file describing your services.
