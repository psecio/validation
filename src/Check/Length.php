<?php

namespace Psecio\Validation\Check;

class Length extends \Psecio\Validation\Check
{
    public $params = ['min', 'max'];

    public function execute($input)
    {
        $params = $this->get();

        if (!isset($params['min'])) {
            throw new \InvalidArgumentException('No minimum length specified for "length" check');
        }
        if (strlen($input) < $params['min']) {
            return false;
        }
        if (isset($params['max']) && strlen($input) > $params['max']) {
            return false;
        }
        return true;
    }
}
