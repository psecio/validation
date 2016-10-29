<?php

namespace Psecio\Validation\Check;

class In extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not in the set';

    public function execute($input)
    {
        $values = $this->get();
        return (in_array($input, $values));
    }
}
