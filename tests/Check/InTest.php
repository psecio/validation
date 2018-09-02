<?php

namespace Psecio\Validation\Check;

use PHPUnit\Framework\TestCase;

class InTest extends TestCase
{
    protected $in;

    public function setUp()
    {
        $this->in = new In('test');
    }
    public function tearDown()
    {
        unset($this->in);
    }

    /**
     * Check that a valid in the set passes the check
     */
    public function testValidInSet()
    {
        $this->in->setAdditional([
            'foo', 'bar', 'baz'
        ]);
        $this->assertTrue($this->in->execute('foo'));
    }

    public function testInvalidInSet()
    {
        $this->in->setAdditional([
            'foo', 'bar', 'baz'
        ]);
        $this->assertFalse($this->in->execute('fail!'));
    }
}
