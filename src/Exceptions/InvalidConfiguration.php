<?php

namespace Kallencode\Wakatime\Exceptions;

use Exception;

class InvalidConfiguration extends Exception
{

    public static function apiKeyNotSpecified()
    {
        return new static('No apiKey was specified. You must provide a valid api key via the configuration file');
    }

    public static function baseUrlNotSpecified()
    {
        return new static('No baseUrl was specified. You must provide a valid base url via the configuration file');
    }

}
