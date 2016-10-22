<?php

namespace Psecio\Validation\Check;

class Date extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        return (strtotime($input) !== false);
    }
}
