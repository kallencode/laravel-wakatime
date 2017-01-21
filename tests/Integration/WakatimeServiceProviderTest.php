<?php

namespace Kallencode\Wakatime\Test\Integration;

use DateTime;
use Wakatime;
use Kallencode\Wakatime\Exceptions\InvalidConfiguration;

class WakatimeServiceProviderTest extends TestCase
{

    /** @test */
    public function it_will_throw_an_exception_if_apiKey_is_not_set()
    {
        $this->app['config']->set('laravel-wakatime.apiKey', '');
        $this->app['config']->set('laravel-wakatime.baseUrl', 'https://example.com');

        $this->setExpectedException(InvalidConfiguration::class);

        Wakatime::getUserDuration(new DateTime('NOW'));
    }

    /** @test */
    public function it_will_throw_an_exception_if_baseUrl_is_not_set()
    {
        $this->app['config']->set('laravel-wakatime.apiKey', 'apikey');
        $this->app['config']->set('laravel-wakatime.baseUrl', '');

        $this->setExpectedException(InvalidConfiguration::class);

        Wakatime::getUserDuration(new DateTime('NOW'));
    }



}
