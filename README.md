# Wakatime API for laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/:package_name.svg?style=flat-square)](https://packagist.org/packages/kallencode/laravel-wakatime)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/kallencode/laravel-wakatime/master.svg?style=flat-square)](https://travis-ci.org/kallencode/laravel-wakatime)
[![Quality Score](https://img.shields.io/scrutinizer/g/kallencode/laravel-wakatime.svg?style=flat-square)](https://scrutinizer-ci.com/g/kallencode/laravel-wakatime)
[![Total Downloads](https://img.shields.io/packagist/dt/kallencode/laravel-wakatime.svg?style=flat-square)](https://packagist.org/packages/kallencode/laravel-wakatime)

Simple package for interacting the the [Wakatime API](https://wakatime.com)

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

The following config file will be published in `config/laravel-wakatime.php`

```php
return [

    'apiKey' => env('WAKATIME_API_KEY'),

    'baseURl' => env('WAKATIME_BASE_URL','https://wakatime.com/api/v1/')

];
```

## Usage

``` php
$userDurations = Wakatime::fetchUserDurations(\Carbon\Carbon::now());
```

or use any not-yet-implemented wakatime API resource:

```php
$result = Wakatime::performRequest("new/resource", [
        'date' => \Carbon\Carbon::now()->format('Y-m-d'),
        'project' => 'project'], []);
```

## Finding your API key

Go to [https://wakatime.com/account/settings](https://wakatime.com/account/settings)



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

## About Kallencode
[Kallencode](https://kallencode.nl)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
