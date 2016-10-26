<?php

namespace Psecio\Validation\Check;

class In extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        $values = $this->get();
        return (in_array($input, $values));
    }
}
