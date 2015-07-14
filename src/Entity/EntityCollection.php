<?php

namespace Optimizely\Entity;

use Optimizely\Entity;

class EntityCollection implements \IteratorAggregate, \Countable
{
    private $entities;

    public function __construct(array $entities = [])
    {
        $this->entities = $entities;
    }

    public function first()
    {
        return $this->entities[0];
    }

    public function last()
    {
        return $this->entities[count($this->entities) - 1];
    }

    public function add(Entity $entity)
    {
        $this->entities[] = $entity;
        return $this;
    }

    /**
     * Returns an iterator for the entities data set.
     *
     * @return \ArrayIterator An \ArrayIterator instance
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->entities);
    }

    /**
     * Returns the count of all entities
     *
     * @return int The number of data
     */
    public function count()
    {
        return count($this->entities);
    }
}
