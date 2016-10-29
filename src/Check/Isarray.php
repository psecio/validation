<?php

namespace Psecio\Validation\Check;

class Isarray extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not an array';

    public function execute($input)
    {
        return is_array($input);
    }
}
