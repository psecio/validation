<?php

namespace Psecio\Validation;
use Psecio\Validation\CheckSet;

class RuleTest extends \PHPUnit_Framework_TestCase
{
    protected $rule;

    public function setUp()
    {
        $this->rule = new Rule();
    }
    public function tearDown()
    {
        unset($this->rule);
    }

    /**
     * Test the getting/setting of the checks
     * A normal call to getChecks() returns the array of checks not an object
     */
    public function testGetSetChecks()
    {
        $checks = [
            new \Psecio\Validation\Check\Alpha()
        ];
        $checkSet = new CheckSet($checks);

        $this->rule->setChecks($checkSet);
        $this->assertEquals($checks, $this->rule->getChecks());
    }
}
