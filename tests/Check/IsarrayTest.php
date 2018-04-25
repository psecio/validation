<?php

namespace Psecio\Validation\Check;

class IsarrayTest extends \PHPUnit_Framework_TestCase
{
    protected $array;

    public function setUp()
    {
        $this->array = new Isarray('test');
    }
    public function tearDown()
    {
        unset($this->array);
    }

    /**
     * Test a valid array value for success
     */
    public function testValidArrayValue()
    {
        $arr = ['foo', 'bar'];
        $this->assertTrue($this->array->execute($arr));
    }

    /**
     * Test an invalid value for the array check
     */
    public function testInvalidArrayValue()
    {
        $this->assertFalse($this->array->execute('badvalue'));
    }
}
