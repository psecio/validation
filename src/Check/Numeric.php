<?php

namespace Psecio\Validation\Check;

class Numeric extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        return is_numeric($input);
    }
}
