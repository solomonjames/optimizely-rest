<?php

namespace Optimizely\Client;

use GuzzleHttp\Psr7\MultipartStream;

/**
 * A project is a collection of experiments, goals, and audiences.
 * Each project has an associated Javascript file to include on the page.
 *
 * @link http://developers.optimizely.com/rest/reference/index.html#projects
 */
class Projects
{
    use ClientTrait;

    /**
     * Get a list of all the projects in your account, with associated metadata.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#list-projects
     */
    public function listAll()
    {
        $uri     = 'projects/';
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Create a new project in your account.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#create-project
     */
    public function create($projectId, array $data)
    {
        $uri     = 'projects/';
        $request = $this->createRequest('POST', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Get metadata for a single project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#read-project
     */
    public function get($projectId)
    {
        $uri     = sprintf('projects/%s/', $projectId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Update metadata for a single project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#update-project
     */
    public function update($projectId, array $data)
    {
        $uri     = sprintf('projects/%s', $projectId);
        $request = $this->createRequest('PUT', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Deleting projects is not supported.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#delete-project
     */
    //public function delete($projectId) {}
}
