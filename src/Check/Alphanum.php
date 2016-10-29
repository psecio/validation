<?php

namespace Psecio\Validation\Check;

class Alphanum extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not alpha-numeric';

    public function execute($input)
    {
        return (preg_match('/^[a-zA-Z0-9]*$/', $input) > 0);
    }
}
