<?php

namespace Psecio\Validation\Check;

class Date extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not a valid date';

    public function execute($input)
    {
        return (strtotime($input) !== false);
    }
}
