<?php

namespace Psecio\Validation\Check;

class BeforeTest extends \PHPUnit_Framework_TestCase
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

        $this->after->setAdditional(['start' => $start]);
        $this->assertTrue($this->after->execute($end));
    }

}
