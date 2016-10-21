<?php

namespace Psecio\Validation\Rule;

class Required extends \Psecio\Validation\Rule
{
    public function execute($input)
    {
        return empty($input);
    }
}
