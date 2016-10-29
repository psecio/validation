<?php

namespace Psecio\Validation\Check;

class Boolean extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not boolean';

    private $allowed = [
        true, false,
        1, 0,
        '1', '0'
    ];

    public function execute($input)
    {
        return in_array($input, $this->allowed, true);
    }
}
