<?php

namespace Psecio\Validation\Check;

class Before extends \Psecio\Validation\Check
{
    public $params = ['start'];
    
    public function execute($input)
    {
        $addl = $this->get();

        $startDate = strtotime($addl['start']);
        if ($startDate === false) {
            throw new \InvalidArgumentException('Invalid start date for "before" evaluation');
        }
        $testDate = strtotime($input);
        if ($testDate === false) {
            throw new \InvalidArgumentException('Invalid input date for "before" evaluation');
        }

        return $testDate < $startDate;
    }
}
