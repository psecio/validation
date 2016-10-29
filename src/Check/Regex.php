<?php

namespace Psecio\Validation\Check;

class Regex extends \Psecio\Validation\Check
{
    public $params = ['pattern'];
    public $message = 'The :name value is does not match the pattern';

    public function execute($input)
    {
        $pattern = $this->get('pattern');
        return (preg_match($pattern, $input) > 0);
    }
}
