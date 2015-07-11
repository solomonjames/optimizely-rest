<?php

namespace Optimizely\Client;

/**
 * An Audience is a group of visitors that match set conditions.
 * You can target an experiment to one or more audiences, or you can segment
 *     experiment results to see how different audiences performed.
 *
 * @link http://developers.optimizely.com/rest/reference/index.html#audiences
 */
class Audiences
{
    use ClientTrait;

    /**
     * Get a list of all the audiences in a project.
     *
     * @link http://developers.optimizely.com/rest/reference/index.html#list-audiences
     */
    public function listAll($projectId)
    {
        $uri     = sprintf('projects/%s/audiences/', $projectId);
        $request = $this->createRequest('GET', $uri);

        return $this->client->send($request);
    }

    /**
     * Create an audiences in a project.
     *
     * @link http://developers.optimizely.com/rest/reference/index.html#create-audience
     */
    public function create($projectId, array $data)
    {
        $uri     = sprintf('projects/%s/audiences/', $projectId);
        $request = $this->createRequest('POST', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->client->send($request);
    }

    /**
     * Get metadata for a single audience.
     *
     * @link http://developers.optimizely.com/rest/reference/index.html#read-audience
     */
    public function get($audienceId)
    {
        $uri     = sprintf('audiences/%s/', $audienceId);
        $request = $this->createRequest('GET', $uri);

        return $this->client->send($request);
    }

    /**
     * Update metadata for a single audience.
     *
     * @link http://developers.optimizely.com/rest/reference/index.html#update-audience
     */
    public function update($audienceId, array $data)
    {
        $uri     = sprintf('audiences/%s', $audienceId);
        $request = $this->createRequest('PUT', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->client->send($request);
    }

    /**
     * This is not supported by the API, so its not available.
     *
     * "Deleting audiences is not supported."
     * @link http://developers.optimizely.com/rest/reference/index.html#delete-audience
     */
    //public function delete($audienceId) {}
}
