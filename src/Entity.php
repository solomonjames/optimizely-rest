<?php

namespace Optimizely;

/**
 *
 */
class Entity
{
    private $entityBag;

    public function __construct(Entity\EntityBag $entityBag)
    {
        $this->entityBag = $entityBag;
    }

    /**
     * Using magic calls to make easy access to data in the EntityBag
     *
     * @param string $name      The name of the method call
     * @param array  $arguments The arguments passed to the method call
     *
     * @return mixed
     */
    public function __call($name, array $arguments = [])
    {
        $convertedName = strtolower(preg_replace('/(?<=\\w)(?=[A-Z])/', "_$1", $name));

        // If there are arguments, then its assumed the consumer is trying to
        // set something, instead of get something
        if (count($arguments) > 0) {
            return $this->entityBag->set($convertedName, $arguments[0]);
        }

        return $this->entityBag->get($convertedName);
    }
}
