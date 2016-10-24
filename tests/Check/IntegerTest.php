<?php

namespace Psecio\Validation\Check;

class IntegerTest extends \PHPUnit_Framework_TestCase
{
    protected $int;

    public function setUp()
    {
        $this->int = new Integer();
    }
    public function tearDown()
    {
        unset($this->int);
    }

    /**
     * Test a valid integer value
     */
    public function testValidIntegerValue()
    {
        $this->assertTrue($this->int->execute(1234));
    }

    /**
     * Test the evaluation of an integer with the minimum value specified
     */
    public function testValidIntegerMinimumOnly()
    {
        // Set the minimum value to 7
        $this->int->setAdditional([7]);

        // This passes as it's higher
        $this->assertTrue($this->int->execute(8));

        // This fails because it's lower
        $this->assertFalse($this->int->execute(2));
    }

    /**
     * Test the evaluation of an integer with the minimum and maximum defined
     */
    public function testValidIntegerMinimumMaximum()
    {
        // Set the minimum value to 7 and max to 10
        $this->int->setAdditional([7, 10]);

        // This passes as it's higher
        $this->assertTrue($this->int->execute(9));

        // These fail because they're out of range
        $this->assertFalse($this->int->execute(12));
        $this->assertFalse($this->int->execute(2));
    }
}
