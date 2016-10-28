<?php

namespace Psecio\Validation\Validator\Request;

class Slim3 extends \Psecio\Validation\Validator
{
    public function execute($input, array $rules = [], array $messages = [])
    {
        if (is_object($input) && $input instanceof \Slim\Http\Request) {
            $input = $input->getParams();
        }
        return parent::execute($input, $rules, $messages);
    }
}
