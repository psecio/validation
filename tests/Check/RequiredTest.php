<?php

namespace Psecio\Validation\Check;

use PHPUnit\Framework\TestCase;

class RequiredTest extends TestCase
{
    protected $req;

    public function setUp()
    {
        $this->req = new Required('test');
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
