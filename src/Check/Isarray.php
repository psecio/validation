<?php

namespace Psecio\Validation\Check;

class Isarray extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        return is_array($input);
    }
}
