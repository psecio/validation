<?php

namespace Psecio\Validation\Check;

class Json extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not a valid JSON string';

    public function execute($input)
    {
        return (json_decode($input) !== null);
    }
}
