<?php

namespace Psecio\Validation\Check;

use PHPUnit\Framework\TestCase;

class AfterTest extends TestCase
{
    protected $after;

    public function setUp()
    {
        $this->after = new After('test1', 'test2');
    }
    public function tearDown()
    {
        unset($this->after);
    }

    public function testCheckValidAfterDate()
    {
        $start = 'yesterday';
        $end = '+2 days';

        $this->after->setAdditional([$start]);
        $this->assertTrue($this->after->execute($end));
    }

}
