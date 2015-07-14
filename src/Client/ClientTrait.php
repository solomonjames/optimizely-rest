<?php

namespace Optimizely\Client;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\ClientInterface;

use Optimizely\Entity;
use Optimizely\Entity\EntityBag;
use Optimizely\Entity\EntityCollection;

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

    protected function handleRequest(Request $request)
    {
        $response = $this->client->send($request);
        $entityData = json_decode($response->getBody()->getContents(), true);

        // If the key 0 is set, then its probably an array of items
        if (isset($entityData[0])) {
            return $this->createEntityCollection($entityData);
        }

        return $this->createEntity($entityData);
    }

    protected function createEntity(array $entityData)
    {
        $entityBag  = new EntityBag($entityData);

        return new Entity($entityBag);
    }

    protected function createEntityCollection(array $entitiesData)
    {
        $entityCollection = new EntityCollection();

        foreach ($entitiesData as $entityData) {
            $entity = $this->createEntity($entityData);
            $entityCollection->add($entity);
        }

        return $entityCollection;
    }
}
