<?php

namespace Psecio\Validation\Check;

class Email extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        return (filter_var($input, FILTER_VALIDATE_EMAIL) === $input);
    }
}
