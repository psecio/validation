<?php

namespace Psecio\Validation\Check;

class AlphaTest extends \PHPUnit_Framework_TestCase
{
    protected $alpha;

    public function setUp()
    {
        $this->alpha = new Alpha('test1', 'test2');
    }
    public function tearDown()
    {
        unset($this->alpha);
    }

    /**
     * Test a valid alpha-only string
     */
    public function testValidAlphaString()
    {
        $string = 'foobarbaz';
        $this->assertTrue($this->alpha->execute($string));
    }

    /**
     * Test the failure of an invalid alpha string
     */
    public function testInvalidAlphaString()
    {
        $string = '12gfds76547^%$#';
        $this->assertFalse($this->alpha->execute($string));
    }
}
