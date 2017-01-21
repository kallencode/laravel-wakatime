<?php

namespace Kallencode\Wakatime;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class WakatimeClient
{

    protected $baseUrl;

    protected $client;

    protected $apiKey;

    public function __construct(Client $client, $baseUrl, $apiKey)
    {
        $this->client = $client;

        $this->baseUrl = $baseUrl;

        $this->apiKey = $apiKey;
    }

    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getApiKey() : string
    {
        return $this->apiKey;
    }


    public function getBaseUrl() : string
    {
        return $this->baseUrl;
    }


    public function performRequest(string $resource, array $headers = [], array $query = []) : Collection
    {
        return collect($this->client->request('GET', "{$this->baseUrl}{$resource}", [
            'headers' => $this->buildHeaders($headers),
            'query' => $query
        ])->getBody()->getContents());
    }

    protected function buildHeaders(array $headers = []) : array
    {
        return array_merge([
            'Authorization' => 'Basic ' . $this->getBase64ApiKey(),
            'Accept' => 'application/json'
            ], $headers);
    }

    private function getBase64ApiKey() : string
    {
        return base64_encode($this->apiKey);
    }


}
