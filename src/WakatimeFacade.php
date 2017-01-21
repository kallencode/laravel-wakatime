<?php

namespace Kallencode\Wakatime;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kallencode\Wakatime\Wakatime
 */
class WakatimeFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-wakatime';
    }
}
