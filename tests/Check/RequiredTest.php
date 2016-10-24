<?php

namespace Psecio\Validation\Check;

class RequiredTest extends \PHPUnit_Framework_TestCase
{
    protected $req;

    public function setUp()
    {
        $this->req = new Required();
    }
    public function tearDown()
    {
        unset($this->req);
    }

    /**
     * Test a passing value on the required check
     */
    public function testRequiredValidValue()
    {
        $this->assertTrue($this->req->execute('valid!'));
    }

    /**
     * Test a "empty" value for a failing check
     */
    public function testRequiredValueInvalid()
    {
        $this->assertFalse($this->req->execute(null));
    }
}
