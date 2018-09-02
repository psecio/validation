<?php

namespace Psecio\Validation\Check;

use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    protected $date;

    public function setUp()
    {
        $this->date = new Date('test');
    }
    public function tearDown()
    {
        unset($this->date);
    }

    /**
     * Test valid date values (ones that can be parsed by strtotime)
     */
    public function testValidDateValues()
    {
        $this->assertTrue($this->date->execute('-3 hours'));
        $this->assertTrue($this->date->execute('02/13/2016 23:56:12'));
    }

    /**
     * Test invalid date values for failure
     */
    public function testInvalidDateValues()
    {
        $this->assertFalse($this->date->execute('baddate'));
        $this->assertFalse($this->date->execute('12/87/2007'));
    }
}
