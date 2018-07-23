PHPStan Contao Framework extensions and rules
=============================================

* [PHPStan](https://github.com/phpstan/phpstan)

This extension provides following features:

* Provides correct return types for Contao services.

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
