<?php

namespace Psecio\Validation\Check;

class JsonTest extends \PHPUnit_Framework_TestCase
{
    protected $json;

    public function setUp()
    {
        $this->json = new Json();
    }
    public function tearDown()
    {
        unset($this->json);
    }

    /**
     * Test the check of a valid JSON string is successful
     */
    public function testValidJsonString()
    {
        $json = '{"test":"foo"}';
        $this->assertTrue($this->json->execute($json));
    }

    public function testInvalidJsonString()
    {
        $json = 'badjson!';
        $this->assertFalse($this->json->execute($json));
    }
}
