<?php

namespace Psecio\Validation\Check;

class Length extends \Psecio\Validation\Check
{
    public $message = 'The :name value is not the right length';

    public $params = ['min', 'max'];

    public function execute($input)
    {
        $params = $this->get();

        if (!isset($params['min'])) {
            throw new \InvalidArgumentException('No minimum length specified for "length" check');
        }
        if (strlen($input) < $params['min']) {
            $this->message = 'The :name value is too short';
            return false;
        }
        if (isset($params['max']) && strlen($input) > $params['max']) {
            $this->message = 'The :name value length is not between '.$params['min'].' and '.$params['max'];
            return false;
        }
        return true;
    }
}
