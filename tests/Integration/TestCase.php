<?php

namespace Kallencode\Wakatime\Test\Integration;

use Kallencode\Wakatime\WakatimeFacade;
use Orchestra\Testbench\TestCase as Orchestra;
use Kallencode\Wakatime\WakatimeServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            WakatimeServiceProvider::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Wakatime' => WakatimeFacade::class,
        ];
    }
}
