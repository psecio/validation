<?php

namespace Psecio\Validation;

class CheckTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test setting the additional info on construct
     */
    public function testGetSetAdditionalOnConstruct()
    {
        $addl = [
            'foo' => 'bar'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', [$addl]);
        $this->assertEquals($addl, $check->get());
    }

    /**
     * Test the getter/setter for additional data when called manually
     */
    public function testGetSetAdditionalManual()
    {
        $addl = [
            'bar' => 'foo'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check');
        $check->setAdditional($addl);

        $this->assertEquals($addl, $check->get());
    }

    /**
     * Test the getting of a valid value from the additional params
     */
    public function testGetAdditionalByNameValid()
    {
        $addl = [
            'foo' => 'bar'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', [$addl]);
        $this->assertEquals('bar', $check->get('foo'));
    }

    /**
     * Test the getting of an invalid name from the additional params
     */
    public function testGetAdditionalByNameInvalid()
    {
        $addl = [
            'foo' => 'bar'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', [$addl]);
        $this->assertNull($check->get('wrongkey'));
    }
}
