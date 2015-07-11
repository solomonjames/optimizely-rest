<?php

namespace Optimizely\Client;

/**
 * Experiments can be scheduled to start or stop at a particular time.
 * A Schedule is a specification of a start time, stop time, or both,
 *     associated with a particular experiment.
 *
 * @link http://developers.optimizely.com/rest/reference/index.html#schedules
 */
class Schedules
{
    use ClientTrait;

    /**
     * See a list containing the current schedule for an experiment
     *     as well as any previously created schedules.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#list-schedules-for-experiment
     */
    public function listAll($experimentId)
    {
        $uri     = sprintf('experiments/%s/schedules', $experimentId);
        $request = $this->createRequest('GET', $uri);

        return $this->client->send($request);
    }

    /**
     * Create a schedule for an experiment.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#create-schedule
     */
    public function create($experimentId, array $data)
    {
        $uri     = sprintf('experiments/%s/schedules', $experimentId);
        $request = $this->createRequest('POST', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->client->send($request);
    }

    /**
     * Get data about a particular schedule, including the start time
     *     and stop time of the associated experiment.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#read-schedule
     */
    public function get($scheduleId)
    {
        $uri     = sprintf('schedules/%s', $scheduleId);
        $request = $this->createRequest('GET', $uri);

        return $this->client->send($request);
    }

    /**
     * Update a schedule.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#update-schedule
     */
    public function update($scheduleId, array $data)
    {
        $uri     = sprintf('schedules/%s', $scheduleId);
        $request = $this->createRequest('PUT', $uri);

        $request->setBody(new MultipartStream($data));

        return $this->client->send($request);
    }

    /**
     * Permanently delete a schedule.
     *
     * @see http://developers.optimizely.com/rest/reference/index.html#delete-schedule
     */
    public function delete($scheduleId)
    {
        $uri     = sprintf('schedules/%s', $scheduleId);
        $request = $this->createRequest('DELETE', $uri);

        return $this->client->send($request);
    }
}
