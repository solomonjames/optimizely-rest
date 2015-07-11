<?php

namespace Optimizely;

use GuzzleHttp\Client as GuzzleClient;

class Client extends GuzzleClient
{
    const BASE_URI = 'https://www.optimizelyapis.com/experiment/v1/';

    private $projectsClient;

    private $experimentsClient;

    private $audiencesClient;

    private $schedulesClient;

    private $variationsClient;

    private $dimensionsClient;

    private $goalsClient;

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

    public function projects()
    {
        if (null === $this->projectsClient) {
            $this->projectsClient = new Client\Projects($this);
        }

        return $this->projectsClient;
    }

    public function experiments()
    {
        if (null === $this->experimentsClient) {
            $this->experimentsClient = new Client\Experiments($this);
        }

        return $this->experimentsClient;
    }

    public function goals()
    {
        if (null === $this->goalsClient) {
            $this->goalsClient = new Client\Goals($this);
        }

        return $this->goalsClient;
    }

    public function schedules()
    {
        if (null === $this->schedulesClient) {
            $this->schedulesClient = new Client\Schedules($this);
        }

        return $this->schedulesClient;
    }

    public function variations()
    {
        if (null === $this->variationsClient) {
            $this->variationsClient = new Client\Variations($this);
        }

        return $this->variationsClient;
    }

    public function audiences()
    {
        if (null === $this->audiencesClient) {
            $this->audiencesClient = new Client\Audiences($this);
        }

        return $this->audiencesClient;
    }

    public function dimensions()
    {
        if (null === $this->dimensionsClient) {
            $this->dimensionsClient = new Client\Dimensions($this);
        }

        return $this->dimensionsClient;
    }
}
