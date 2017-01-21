<?php

namespace Kallencode\Wakatime;

use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Macroable;

class Wakatime
{
    use Macroable;

    protected $client;

    /**
     * Create a new Wakatime Instance.
     */
    public function __construct(WakatimeClient $client)
    {
        $this->client = $client;
    }

    public function setApiKey(string $apiKey)
    {
        $this->client->setApiKey($apiKey);

        return $this;
    }

    public function getApiKey() : string
    {
         return $this->client->getApiKey();
    }

    public function getBaseUrl() : string
    {
        return $this->client->getBaseUrl();
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->client->setBaseUrl($baseUrl);

        return $this;
    }

    /**
     * Fetches the User's durations for the specified Date
     *
     *
     * @param  DateTime $date
     * @param  string   $user
     * @param  array    $optionalQuery
     *         project  (optional) Only show duration for this project
     *         branches (optional) Only show durations for these branches:
     *                             comma separated list of branch names
     * @return Collection
     */
    public function fetchUserDurations(DateTime $date, string $user = 'current', array $optionalQuery = []) : Collection
    {
        $query = array_merge([
            'date' => $date->format('Y-m-d'), $optionalQuery]);

        return $this->performRequest("users/{$user}/durations", $query, []);
    }


    public function performRequest($resource, array $query = [], array $headers = [])
    {
        return $this->client->performRequest($resource, $headers, $query);
    }

}
