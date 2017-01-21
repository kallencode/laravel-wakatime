<?php

namespace Kallencode\Wakatime;

class WakatimeClientFactory
{

    public static function createForConfig(array $config) : WakatimeClient
    {
        $guzzleClient = new \GuzzleHttp\Client;

        $baseUrl = $config['baseUrl'];
        $apiKey = $config['apiKey'];

        return new WakatimeClient($guzzleClient, $baseUrl, $apiKey);
    }
}
