<?php

namespace Psecio\Validation\Check;

class Alpha extends \Psecio\Validation\Check
{
    public $message = 'The :name value contains more than just alphabetic characters';

    public function execute($input)
    {
        return (preg_match('/^[a-zA-Z]*$/', $input) > 0);
    }
}
