<?php

namespace Psecio\Validation\Check;

/**
 * Evaluate the data to ensure it is set
 */
class Required extends \Psecio\Validation\Check
{
    public $message = 'The :name value is required';

    public function execute($input)
    {
        return !empty($input);
    }
}
