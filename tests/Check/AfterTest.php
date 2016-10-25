<?php

namespace Psecio\Validation\Check;

class AfterTest extends \PHPUnit_Framework_TestCase
{
    protected $after;

    public function setUp()
    {
        $this->after = new After();
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
