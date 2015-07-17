<?php

namespace Optimizely\Client;

/**
 * Every experiment contains a set of variations that each change the visitor's
 *     experience in a different way.
 * Variations define the code that should be applied on a page to change the experience,
 *     and the percentage of visitors who should see that code. A standard "A/B"
 *     test has two variations (including the original), and Optimizely supports
 *     adding many more variations.
 *
 * @link http://developers.optimizely.com/rest/reference/index.html#variations
 */
class Variations
{
    use ClientTrait;

    /**
     * List all variations associated with the experiment.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#list-audiences
     */
    public function listAll($experimentId)
    {
        $uri     = sprintf('experiments/%s/variations/', $experimentId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Create a variation for an experiment
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#create-variation
     */
    public function create($experimentId, array $data)
    {
        $uri     = sprintf('experiments/%s/variations/', $experimentId);
        $request = $this->createRequest('POST', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Get a variation in an experiment
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#read-variation
     */
    public function get($variationId)
    {
        $uri     = sprintf('schedules/%s', $scheduleId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Update a variation in an experiment
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#update-variation
     */
    public function update($variationId, array $data)
    {
        $uri     = sprintf('variations/%s', $variationId);
        $request = $this->createRequest('PUT', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Delete a variation in an experiment
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#delete-variation
     */
    public function delete($variationId)
    {
        $uri     = sprintf('variations/%s', $scheduleId);
        $request = $this->createRequest('DELETE', $uri);

        return $this->handleRequest($request);
    }
}
