<?php

namespace Psecio\Validation\Check;

class NumericTest extends \PHPUnit_Framework_TestCase
{
    protected $num;

    public function setUp()
    {
        $this->num = new Numeric('test');
    }
    public function tearDown()
    {
        unset($this->num);
    }

    /**
     * Test valid numeric values for passing
     */
    public function testValidNumericValue()
    {
        $this->assertTrue($this->num->execute('12345'));
        $this->assertTrue($this->num->execute(8765));
    }

    /**
     * Test invalid numeric values for failure
     */
    public function testInvalidNumericValue()
    {
        $this->assertFalse($this->num->execute('badvalue'));
        $this->assertFalse($this->num->execute('1234badvalue'));
    }
}
