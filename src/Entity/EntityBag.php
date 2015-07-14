<?php

namespace Optimizely\Entity;

/**
 * EntityBag allows easy access to any data about an entity
 */
class EntityBag implements \IteratorAggregate, \Countable
{
    /**
     * Raw data storage
     *
     * @var array
     */
    protected $data;

    /**
     * Constructor, add that data
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Returns the data in its current state
     *
     * @return array An array of data
     */
    public function all()
    {
        return $this->data;
    }

    /**
     * Returns all the keys.
     *
     * @return array An array of the entities keys
     */
    public function keys()
    {
        return array_keys($this->data);
    }

    /**
     * Replaces the current data with provided data
     *
     * @param array $data An array of data
     *
     * @return self
     */
    public function replace(array $data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Adds data to the entity
     *
     * @param array $data An array of new data to add/replace
     *
     * @return self
     */
    public function add(array $data = [])
    {
        $this->data = array_replace($this->data, $data);
        return $this;
    }

    /**
     * Returns a value by name.
     *
     * @param string $path    The key
     * @param mixed  $default The default value if the key does not exist
     *
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return array_key_exists($key, $this->data) ? $this->data[$key] : $default;
    }

    /**
     * Sets a value by name.
     *
     * @param string $key   The key
     * @param mixed  $value The value
     *
     * @return self
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * Returns true if the key is defined.
     *
     * @param string $key The key
     *
     * @return Boolean true if the key exists, false otherwise
     */
    public function has($key)
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * Removes a key.
     *
     * @param string $key The key
     *
     * @return self
     */
    public function remove($key)
    {
        unset($this->data[$key]);
        return $this;
    }

    /**
     * Returns an iterator for the entities data set.
     *
     * @return \ArrayIterator An \ArrayIterator instance
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * Returns the count of all elements in set.
     *
     * @return int The number of data
     */
    public function count()
    {
        return count($this->data);
    }
}
