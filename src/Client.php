<?php

namespace Optimizely;

use GuzzleHttp\Client as GuzzleClient;

class Client extends GuzzleClient
{
    const BASE_URI = 'https://www.optimizelyapis.com/experiment/v1/';

    public function __construct(array $config = [])
    {
        if (false === isset($config['base_uri'])) {
            $config['base_uri'] = self::BASE_URI;
        }

        if (false === isset($config['token'])) {
            throw new \InvalidArgumentException('The "token" key is required');
        }

        $config['headers'] = [
            'Token' => $config['token'],
        ];

        unset($config['token']);

        parent::__construct($config);
    }
}
