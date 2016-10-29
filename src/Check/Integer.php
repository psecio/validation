<?php

namespace Psecio\Validation\Check;

class Integer extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not an integer';

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
                $this->message = 'The :name value is not large enough';
                $fail = true;
            }
        }
        if ($fail === false && isset($addl['max'])) {
            if ($input > $addl['max']) {
                $this->message = 'The :name value is not between '.$addl['min'].' and '.$addl['max'];
                $fail = true;
            }
        }

        // If we failed, let it know
        return ($fail === true) ? false : true;
    }
}
