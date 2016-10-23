<?php

namespace Psecio\Validation;

class CheckSetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test the looping of the set via a foreach
     */
    public function testForeachValid()
    {
        $checks = [
            new \Psecio\Validation\Check\Integer(),
            new \Psecio\Validation\Check\Numeric()
        ];
        $set = new CheckSet($checks);
        foreach ($set as $index => $check) {
            $this->assertEquals($checks[$index], $check);
        }
    }

    /**
     * Test accessing the checks in the set as an array
     */
    public function testArrayAccessValid()
    {
        $checks = [
            new \Psecio\Validation\Check\Integer(),
            new \Psecio\Validation\Check\Numeric()
        ];
        $set = new CheckSet($checks);

        $this->assertEquals($checks[0], $set[0]);
    }

}
