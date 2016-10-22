<?php

namespace Psecio\Validation\Check;

class Integer extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        $fail = false;
        $addl = $this->get();
        if (empty($addl)) {
            return is_int($input);
        }
        if (isset($addl[0])) {
            if ($input < $addl[0]) {
                $fail = true;
            }
        }
        if ($fail === false && isset($addl[1])) {
            if ($input > $addl[1]) {
                $fail = true;
            }
        }

        // If we failed, let it know
        return ($fail === true) ? false : true;
    }
}
