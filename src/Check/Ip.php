<?php

namespace Psecio\Validation\Check;

class Ip extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not a valid IPv4 or IPv6 address';

    public function execute($input)
    {
        return (filter_var($input, FILTER_VALIDATE_IP) === $input);
    }
}
