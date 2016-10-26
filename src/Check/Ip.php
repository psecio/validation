<?php

namespace Psecio\Validation\Check;

class Ip extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        return (filter_var($input, FILTER_VALIDATE_IP) === $input);
    }
}
