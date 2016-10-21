<?php

namespace Psecio\Validate\Rule;

class Required extends \Psecio\Validate\Rule
{
    public function execute($input)
    {
        return empty($input);
    }
}
