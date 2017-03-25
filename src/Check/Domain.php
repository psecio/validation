<?php

namespace Psecio\Validation\Check;

class Domain extends \Psecio\Validation\Check
{
    public $message = 'The value is not a valid domain or is in an incorrect format';

    public function execute($input)
    {
        $url = parse_url('http://'.$input);
        return ($url !== false && isset($url['host']));
    }
}
