<?php

namespace Psecio\Validation\Check;

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    protected $boolean;

    public function setUp()
    {
        $this->boolean = new Boolean();
    }
    public function tearDown()
    {
        unset($this->boolean);
    }

    public function booleanValueProvider()
    {
        return [
            [0], [1], ['0'], ['1'], [true], [false]
        ];
    }

    /**
     * Test the passing of valid boolean values
     *
     * @param mixed $value Value under test
     * @dataProvider booleanValueProvider
     */
    public function testValidBooleanString($value)
    {
        $this->assertTrue($this->boolean->execute($value));
    }

    /**
     * Ensure that bad values fail the evaluation
     */
    public function testInvalidBooleanValue()
    {
        $this->assertFalse($this->boolean->execute('54fsa'));
        $this->assertFalse($this->boolean->execute('true'));
    }
}
