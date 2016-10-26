<?php

namespace Psecio\Validation\Check;

class LengthTest extends \PHPUnit_Framework_TestCase
{
    protected $length;

    public function setUp()
    {
        $this->length = new Length();
    }
    public function tearDown()
    {
        unset($this->length);
    }

    /**
     * Test that an exception is thrown when no minimum length is provided
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionNoMinimumLength()
    {
        $this->length->execute('no minimum');
    }

    /**
     * Test that a string matches the minimum length
     */
    public function testStringPassesMinimum()
    {
        $string = 'this is longer than 5 characters';

        $this->length->setAdditional(['min' => 5]);
        $this->assertTrue($this->length->execute($string));
    }

    /**
     * Test that a string passes when under (or equal to) the maximum length
     */
    public function testStringPassesMaximum()
    {
        $string = 'this is longer than 5 characters';
        $this->length->setAdditional([
            'min' => 5,
            'max' => 35
        ]);
        $this->assertTrue($this->length->execute($string));
    }

    /**
     * Test that the string fails the minimum check if too short
     */
    public function testStringFailsMinimum()
    {
        $string = 'fail!';

        $this->length->setAdditional(['min' => 10]);
        $this->assertFalse($this->length->execute($string));
    }

    /**
     * Test that a string that's too long fails the maximum length check
     */
    public function testStringFailMaximum()
    {
        $string = 'this is longer than 5 characters';
        $this->length->setAdditional([
            'min' => 5,
            'max' => 10
        ]);
        $this->assertFalse($this->length->execute($string));
    }
}
