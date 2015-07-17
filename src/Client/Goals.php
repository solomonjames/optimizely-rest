<?php

namespace Optimizely\Client;

/**
 * Goals are the metrics used to decide which variation in an experiment is the winner.
 * Like audiences, goals are defined at the project level and can be reused across
 *     multiple experiments within a project. Each goal is tracked for each experiment
 *     it's associated with. An experiment with no goals will still run,
 *     but its results page will be empty.
 *
 * @link http://developers.optimizely.com/rest/reference/index.html#goals
 */
class Goals
{
    use ClientTrait;

    /**
     * Get a list of all the goals in a project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#list-goals
     */
    public function listAll($projectId)
    {
        $uri     = sprintf('projects/%s/goals/', $projectId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Create a goal in a project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#create-goal
     */
    public function create($projectId, array $data)
    {
        $uri     = sprintf('projects/%s/goals/', $projectId);
        $request = $this->createRequest('POST', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Get a goal in a project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#read-goal
     */
    public function get($goalId)
    {
        $uri     = sprintf('goals/%s/', $goalId);
        $request = $this->createRequest('GET', $uri);

        return $this->handleRequest($request);
    }

    /**
     * Update a goal in a project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#update-goal
     */
    public function update($goalId, array $data)
    {
        $uri     = sprintf('goals/%s', $goalId);
        $request = $this->createRequest('PUT', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->handleRequest($request);
    }

    /**
     * Delete a goal in a project.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#delete-goal
     */
    public function delete($goalId)
    {
        $uri     = sprintf('goals/%s', $goalId);
        $request = $this->createRequest('DELETE', $uri);

        return $this->handleRequest($request);
    }
}
