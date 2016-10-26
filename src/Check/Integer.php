<?php

namespace Psecio\Validation\Check;

class Integer extends \Psecio\Validation\Check
{
    public $params = ['min', 'max'];

    public function execute($input)
    {
        $fail = false;
        $addl = $this->get();

        if (empty($addl)) {
            return is_int($input);
        }
        if (isset($addl['min'])) {
            if ($input < $addl['min']) {
                $fail = true;
            }
        }
        if ($fail === false && isset($addl['max'])) {
            if ($input > $addl['max']) {
                $fail = true;
            }
        }

        // If we failed, let it know
        return ($fail === true) ? false : true;
    }
}
