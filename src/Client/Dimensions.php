<?php

namespace Optimizely\Client;

/**
 * Dimensions are attributes of visitors to your website or mobile app,
 *     such as demographic data, behavioral characteristics, or any other
 *     information particular to a visitor.
 * Dimensions can be used to construct audiences and segment experiment results.
 *
 * @link http://developers.optimizely.com/rest/reference/index.html#dimension
 */
class Dimensions
{
    use ClientTrait;

    /**
     * Get a list of all the custom dimensions in a project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#list-dimensions
     */
    public function listAll($projectId)
    {
        $uri     = sprintf('projects/%s/dimensions/', $projectId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Create a new custom dimensions in a project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#create-dimension
     */
    public function create($projectId, array $data)
    {
        $uri     = sprintf('projects/%s/dimensions', $projectId);
        $request = $this->createRequest('POST', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Get metadata for a single dimension.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#read-dimension
     */
    public function get($dimensionId)
    {
        $uri     = sprintf('dimensions/%s/', $dimensionId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Update metadata for a single dimension.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#update-dimension
     */
    public function update($dimensionId, array $data)
    {
        $uri     = sprintf('dimensions/%s', $dimensionId);
        $request = $this->createRequest('PUT', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Permanently delete a dimension.
     *
     * By taking this action, any audiences using this dimension
     *     will stop getting traffic, and results associated with this dimension
     *     will be permanently deleted.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#delete-dimension
     */
    public function delete($dimensionId)
    {
        $uri     = sprintf('dimensions/%s', $dimensionId);
        $request = $this->createRequest('DELETE', $uri);

        return $this->handleRequest($request);
    }
}
