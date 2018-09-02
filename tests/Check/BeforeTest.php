<?php

namespace Psecio\Validation\Check;

use PHPUnit\Framework\TestCase;

class BeforeTest extends TestCase
{
    protected $before;

    public function setUp()
    {
        $this->before = new Before('test');
    }
    public function tearDown()
    {
        unset($this->before);
    }

    public function testCheckValidAfterDate()
    {
        $start = '+2 days';
        $end = 'yesterday';

        $this->before->setAdditional(['start' => $start]);
        $this->assertTrue($this->before->execute($end));
    }

}
