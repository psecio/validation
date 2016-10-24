<?php

namespace Psecio\Validation\Check;

class AlphanumTest extends \PHPUnit_Framework_TestCase
{
    protected $alphanum;

    public function setUp()
    {
        $this->alphanum = new Alphanum();
    }
    public function tearDown()
    {
        unset($this->alphanum);
    }

    /**
     * Test the passing of a valid alhpa-numeric string
     */
    public function testValidAlphanumString()
    {
        $string = 'dfasfa5425423frg890';
        $this->assertTrue($this->alphanum->execute($string));
    }

    /**
     * Test the failure of an invalid alpha-numeric string
     */
    public function testInvalidAlphanumString()
    {
        $string = 'fda543*&^%$gfs';
        $this->assertFalse($this->alphanum->execute($string));
    }
}
