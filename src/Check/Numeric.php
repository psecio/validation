<?php

namespace Psecio\Validation\Check;

class Numeric extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not numeric';

    public function execute($input)
    {
        return is_numeric($input);
    }
}
