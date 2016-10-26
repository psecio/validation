<?php

namespace Psecio\Validation\Check;

class Json extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        return (json_decode($input) !== null);
    }
}
