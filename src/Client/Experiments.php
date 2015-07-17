<?php

namespace Optimizely\Client;

use GuzzleHttp\Psr7\MultipartStream;

/**
 * An A/B experiment is a set of rules for matching visitors to content and
 *    recording their conversions.
 * Experiments are the hub that connect several other models.
 *
 * @link http://developers.optimizely.com/rest/reference/index.html#experiments
 */
class Experiments
{
    use ClientTrait;

    /**
     * Get a list of all the experiments in a project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#list-experiments
     */
    public function listAll($projectId)
    {
        $uri     = sprintf('projects/%s/experiments/', $projectId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Create a new experiment in a project
     *
     * Project will be status of "Not Started" by default
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#create-experiment
     */
    public function create($projectId, array $data)
    {
        $uri     = sprintf('projects/%s/schedules/', $projectId);
        $request = $this->createRequest('POST', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Get metadata for a single experiment.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#read-experiment
     */
    public function get($experimentId)
    {
        $uri     = sprintf('experiments/%s/', $experimentId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Update metadata for a single experiment.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#update-experiment
     */
    public function update($experimentId, array $data)
    {
        $uri     = sprintf('experiments/%s', $experimentId);
        $request = $this->createRequest('PUT', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Permanently delete the experiment and its results.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#delete-experiment
     */
    public function delete($experimentId)
    {
        $uri     = sprintf('experiments/%s', $experimentId);
        $request = $this->createRequest('DELETE', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Use the results endpoint to get the top-level results of an experiment,
     *     including number of visitors, number of conversions,
     *     and chance to beat baseline for each variation.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#get-results
     */
    public function results($experimentId)
    {
        $uri     = sprintf('experiments/%s/results', $experimentId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * The /stats endpoint is identical to the /results endpoint,
     *     except that the confidence field (i.e. chance to beat baseline)
     *     has been replaced with result statistics provided by the
     *     Optimizely Stats Engine.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#get-stats
     */
    public function stats($experimentId)
    {
        $uri     = sprintf('experiments/%s/stats', $experimentId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }
}
