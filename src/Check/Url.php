<?php

namespace Psecio\Validation\Check;

class Url extends \Psecio\Validation\Check
{
    public $message = 'The :name value is an invalid URL';

    public function execute($input)
    {
        return filter_var($input, FILTER_VALIDATE_URL);
    }
}
