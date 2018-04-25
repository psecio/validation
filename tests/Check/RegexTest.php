<?php

namespace Psecio\Validation\Check;

class RegexTest extends \PHPUnit_Framework_TestCase
{
    protected $regex;

    public function setUp()
    {
        $this->regex = new Regex('test');
    }
    public function tearDown()
    {
        unset($this->regex);
    }

    /**
     * Test that there are matches for a regular expression in the given string
     */
    public function testValidRegexMatch()
    {
        $pattern = '/[0-9]+/';
        $string = 'phone number: 1-800-123-4567';

        $this->regex->setAdditional([
            'pattern' => $pattern
        ]);
        $this->assertTrue($this->regex->execute($string));
    }

    /**
     * Test the failure of the check when there's no regex match
     */
    public function testInvalidRegexMatch()
    {
        $pattern = '/[0-9]+/';
        $string = 'phone number but no digits!';

        $this->regex->setAdditional([
            'pattern' => $pattern
        ]);
        $this->assertFalse($this->regex->execute($string));
    }
}
