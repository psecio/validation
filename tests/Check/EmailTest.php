<?php

namespace Psecio\Validation\Check;

class EmailTest extends \PHPUnit_Framework_TestCase
{
    protected $email;

    public function setUp()
    {
        $this->email = new Email('test');
    }
    public function tearDown()
    {
        unset($this->email);
    }

    /**
     * Test a check of a valid email for a passing result
     */
    public function testValidEmail()
    {
        $email = 'foo@bar.com';
        $this->assertTrue($this->email->execute($email));
    }

    /**
     * Test a check of an invalid email for a failing result
     */
    public function testInvalidEamil()
    {
        $email = 'bad-email-address';
        $this->assertFalse($this->email->execute($email));
    }
}
