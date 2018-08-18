<?php

namespace Psecio\Validation\Check;

class Callback extends \Psecio\Validation\Check
{
    public function execute($input)
    {
        $addl = $this->get();
        list($class, $method) = explode('::', $addl[0]);
        
        if (!method_exists($class, $method)) {
            throw new \InvalidArgumentException('Invalid callback: '.$method);
        }
        $call = $class.'::'.$method;
        return $call($input);
    }
}
