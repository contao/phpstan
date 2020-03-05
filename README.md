PHPStan Contao Framework extensions and rules
=============================================

* [PHPStan](https://github.com/phpstan/phpstan)

This extension provides following features:

* Provides correct return types for Contao services.

<a href="https://github.com/contao/phpstan/actions"><img src="https://img.shields.io/github/workflow/status/contao/phpstan/CI/master" alt="GitHub"></a>
<a href="https://codecov.io/gh/contao/phpstan"><img src="https://codecov.io/gh/contao/phpstan/branch/master/graph/badge.svg" /></a>
<a href="https://packagist.org/packages/contao/phpstan"><img src="https://img.shields.io/packagist/v/contao/phpstan.svg" /></a>
<a href="https://packagist.org/packages/contao/phpstan"><img src="https://img.shields.io/packagist/dt/contao/phpstan.svg" /></a>


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
