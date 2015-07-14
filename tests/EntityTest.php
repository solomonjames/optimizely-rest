<?php

use Optimizely\Entity;
use Optimizely\Entity\EntityBag;

class EntityTest extends PHPUnit_Framework_TestCase
{
    public function testCamelCaseConversion()
    {
        $bag = new EntityBag(['test_key' => 'value']);
        $entity = new Entity($bag);

        $this->assertEquals($entity->testKey(), 'value');
    }
}
