<?php

namespace Psecio\Validation\Check;

class Email extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not a valid email address';

    public function execute($input)
    {
        return (filter_var($input, FILTER_VALIDATE_EMAIL) === $input);
    }
}
