<?php

use Optimizely\Entity;
use Optimizely\Entity\EntityBag;

class EntityTest extends PHPUnit_Framework_TestCase
{
    public function testCamelCaseConversion()
    {
        $entity = $this->makeEntity(['test_key' => 'value']);

        $this->assertEquals($entity->testKey(), 'value');
    }

    public function testSettingWithCamelCaseAttribute()
    {
        $entity = $this->makeEntity(['test_key' => 'value']);

        $entity->testKey('value-new');

        $this->assertEquals($entity->testKey(), 'value-new');
    }

    private function makeEntity(array $data)
    {
        $bag    = new EntityBag($data);
        $entity = new Entity($bag);

        return $entity;
    }
}
