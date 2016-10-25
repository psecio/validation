<?php

namespace Psecio\Validation\Check;

class After extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        $addl = $this->get();
        
        $startDate = strtotime($addl[0]);
        if ($startDate === false) {
            throw new \InvalidArgumentException('Invalid start date for "after" evaluation');
        }
        $testDate = strtotime($input);
        if ($testDate === false) {
            throw new \InvalidArgumentException('Invalid input date for "after" evaluation');
        }

        return $testDate > $startDate;
    }
}
