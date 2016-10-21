<?php

namespace Psecio\Validate;

abstract class Validator
{
    public static function getInstance($type = null)
    {
        if ($type === null) {
            return new \Psecio\Validator\Simple();
        } else {
            // get a more complex one
        }
    }

    public abstract function execute($input, $rules = []);
}
