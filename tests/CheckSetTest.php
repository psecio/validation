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
        $this->assertFalse(isset($set[4]));

        // Set a new item and then fetch it
        $set[2] = new \Psecio\Validation\Check\Boolean();
        $this->assertInstanceOf('\Psecio\Validation\Check\Boolean', $set[2]);
        unset($set[2]);
        $this->assertFalse(isset($set[2]));
    }
}
