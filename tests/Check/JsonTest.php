<?php

namespace Psecio\Validation\Check;

use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    protected $json;

    public function setUp()
    {
        $this->json = new Json('test');
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
