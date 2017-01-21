# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/:package_name.svg?style=flat-square)](https://packagist.org/packages/kallencode/laravel-wakatime)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/kallencode/laravel-wakatime/master.svg?style=flat-square)](https://travis-ci.org/kallencode/laravel-wakatime)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/xxxxxxxxx.svg?style=flat-square)](https://insight.sensiolabs.com/projects/xxxxxxxxx)
[![Quality Score](https://img.shields.io/scrutinizer/g/kallencode/laravel-wakatime.svg?style=flat-square)](https://scrutinizer-ci.com/g/kallencode/laravel-wakatime)
[![Total Downloads](https://img.shields.io/packagist/dt/kallencode/laravel-wakatime.svg?style=flat-square)](https://packagist.org/packages/kallencode/laravel-wakatime)


This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.


## Installation

You can install the package via composer:

``` bash
composer require kallencode/laravel-wakatime
```

Install the ServiceProvider.

```php
// config/app.php
'providers' => [
    ...
    Kallencode\Wakatime\WakatimeServiceProvider::class,
    ...
];
```

This package also comes with a facade:

```php
// config/app.php
'aliases' => [
    ...
    'Wakatime' => Kallencode\Wakatime\WakatimeFacade::class,
    ...
];
```

You can publish the config file of this package with this command:

```php
php artisan vendor:publish --provider="Kallencode\Wakatime\WakatimeServiceProvider"
```

Follow following config file will be publoshed in `config/laravel-wakatime.php`

```php
return [

    'apiKey' => env('WAKATIME_API_KEY'),

    'baseURl' => env('WAKATIME_BASE_URL','https://wakatime.com/api/v1/')

];

## Usage

``` php
$userDurations = Wakatime::fetchUserDuration(\Carbon\Carbon::now());
```

or use any not-yet-implemented wakatime API resource:

```php

$result = Wakatime::performRequest();

```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email info@kallencode.nl instead of using the issue tracker.

## Credits

- [Roelof Kallenkoot](https://github.com/rkallenkoot)
- [All Contributors](../../contributors)

## About Spatie
Spatie is a webdesign agency based in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
