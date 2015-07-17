<?php

namespace Optimizely\Client;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\ClientInterface;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use Optimizely\Entity;
use Optimizely\Entity\EntityBag;
use Optimizely\Entity\EntityCollection;

trait ClientTrait
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * Public Constructor
     *
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get the current client
     *
     * @return ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the client to use for API calls
     *
     * @param ClientInterface $client
     *
     * @return self
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Create the request to use in sending with the client
     *
     * @param string $method HTTP Method to use
     * @param string $uri    The URI to request
     *
     * @return Request
     */
    protected function createRequest($method, $uri)
    {
        $newRequest = new Request($method, $uri);

        return $newRequest;
    }

    /**
     * Send the request, and handle the response
     *
     * @param Request $request The request to send via client
     *
     * @return Entity|EntityCollection
     */
    protected function handleRequest(RequestInterface $request)
    {
        $response = $this->client->send($request);
        $entityData = $this->decodeResponse($response);

        // If the key 0 is set, then its probably an array of items
        if (isset($entityData[0])) {
            return $this->createEntityCollection($entityData);
        }

        return $this->createEntity($entityData);
    }

    /**
     * Decode the response from the request
     *
     * @param ResponseInterface $response
     *
     * @return array
     */
    protected function decodeResponse($response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * Create an entity from the data provided
     *
     * @param array $entityData
     *
     * @return Entity
     */
    protected function createEntity(array $entityData)
    {
        $entityBag  = new EntityBag($entityData);

        return new Entity($entityBag);
    }

    /**
     * Create an entity collection from the data provided
     *
     * @param array $entitiesData Array of data for more than one entity
     *
     * @return EntityCollection
     */
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
