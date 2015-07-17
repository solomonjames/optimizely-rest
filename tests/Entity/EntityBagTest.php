<?php

use Optimizely\Entity\EntityBag;

class EntityBagTest extends PHPUnit_Framework_TestCase
{
    private $testData = [];

    protected function setUp()
    {
        $this->testData = [
            'test'  => 'value',
            'test2' => 'value2'
        ];
    }

    public function testGettingAllData()
    {
        $bag = new EntityBag($this->testData);

        $this->assertEquals($this->testData, $bag->all());
    }

    public function testGettingAllDataAfterAddingData()
    {
        $bag = new EntityBag($this->testData);

        $bag->set('test3', 'value3');

        $this->assertEquals($this->testData + ['test3' => 'value3'], $bag->all());
    }

    public function testGettingByKey()
    {
        $bag = new EntityBag($this->testData);

        $this->assertEquals($bag->get('test'), 'value');
    }

    public function testGettingAllKeys()
    {
        $bag = new EntityBag($this->testData);

        $this->assertEquals(array_keys($this->testData), $bag->keys());
    }
}
