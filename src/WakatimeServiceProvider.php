<?php

namespace Kallencode\Wakatime;

use Illuminate\Support\ServiceProvider;
use Kallencode\Wakatime\Exceptions\InvalidConfiguration;

class WakatimeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-wakatime.php' =>
                    config_path('laravel-wakatime.php'),
            ], 'config');
        }
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $config = config('laravel-wakatime');

        $this->app->bind(WakatimeClient::class, function() use ($config) {
            return WakatimeClientFactory::createForConfig($config);
        });

        $this->app->bind(Wakatime::class, function() use ($config) {
            $this->guardAgainstInvalidConfig($config);
            $client = app(WakatimeClient::class);

            return new Wakatime($client);
        });

        $this->app->alias(Wakatime::class, 'laravel-wakatime');
    }

    /**
     * @param  array|null $config
     *
     * @throws \Kallencode\Wakatime\Exceptions\InvalidConfiguration
     */
    public function guardAgainstInvalidConfig($config)
    {
        if(empty($config['apiKey'])) {
            throw InvalidConfiguration::apiKeyNotSpecified();
        }
        if(empty($config['baseUrl'])) {
            throw InvalidConfiguration::baseUrlNotSpecified();
        }
    }


}
