<?php

namespace Psecio\Validation\Check;

class Alpha extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        return (preg_match('/^[a-zA-Z]*$/', $input) > 0);
    }
}
