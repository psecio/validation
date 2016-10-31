<?php

namespace Psecio\Validation\Check;

class Equal extends \Psecio\Validation\Check
{
    public $message = 'The :name value must match the :match field';
    public $params = ['name'];

    public function execute($input)
    {
        $data = $this->getInput();
        $compare = $data[$this->get('name')];
        if ($compare !== $input) {
            $this->message = str_replace(
                [':name', ':match'],
                [$this->get('name'), $this->getKey()],
                $this->message
            );
            return false;
        }
        return true;
    }
}
