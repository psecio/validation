<?php

namespace Psecio\Validation;

use PHPUnit\Framework\TestCase;

class CheckTest extends TestCase
{
    /**
     * Test setting the additional info on construct
     */
    public function testGetSetAdditionalOnConstruct()
    {
        $addl = [
            'foo' => 'bar'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', ['test1', 'test2', $addl]);
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
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', ['test1']);
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
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', ['test1', 'test2', $addl]);
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

    /**
     * Test that can get the input
     */
    public function testGetInput()
    {
        $addl = [
            'foo' => 'bar'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', [$addl]);
        $check->setInput('input_value');
        $this->assertEquals('input_value', $check->getInput());
    }

    /**
     * Test that can get the key
     */
    public function testGetKey()
    {
        $addl = [
            'foo' => 'bar'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', [$addl]);
        $check->setKey('key');
        $this->assertEquals('key', $check->getKey());
    }

    /**
     * Test that can get the type
     */
    public function testGetType()
    {
        $addl = [
            'foo' => 'bar'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', [$addl]);
        $this->assertStringStartsWith('mock_', $check->getType());
    }

    /**
     * Test that can get the message if name is null
     */
    public function testGetMessage()
    {
        $addl = [
            'foo' => 'bar'
        ];
        $check = $this->getMockForAbstractClass('\Psecio\Validation\Check', [$addl]);
        $this->assertEquals('', $check->getMessage());
    }
}
