<?php

namespace Optimizely\Client;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\ClientInterface;

trait ClientTrait
{
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
        return $this;
    }

    protected function createRequest($method, $uri)
    {
        $newRequest = new Request($method, $uri);

        return $newRequest;
    }
}
