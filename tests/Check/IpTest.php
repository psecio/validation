<?php

namespace Psecio\Validation\Check;

use PHPUnit\Framework\TestCase;

class IpTest extends TestCase
{
    protected $ip;

    public function setUp()
    {
        $this->ip = new Ip('test');
    }
    public function tearDown()
    {
        unset($this->ip);
    }

    /**
     * Test the check passing on a valid IPv4 address
     */
    public function testValidIpV4Address()
    {
        $ipAddress = '192.0.0.1';
        $this->assertTrue($this->ip->execute($ipAddress));
    }

    /**
     * Test that a valid IPv6 address passes the check
     */
    public function testValidIpv6Address()
    {
        $ipAddress = '2001:0db8:85a3:0000:0000:8a2e:0370:7334';
        $this->assertTrue($this->ip->execute($ipAddress));
    }

    /**
     * Test that an invalid IP address fails validation
     */
    public function testInvalidIpAddress()
    {
        $ipAddress = '12345';
        $this->assertFalse($this->ip->execute($ipAddress));
    }
}
