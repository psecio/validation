<?php

namespace Psecio\Validation;

abstract class Check
{
    protected $addl = [];

    public function __construct(array $addl = [])
    {
        $this->setAdditional($addl);
    }

    public function setAdditional(array $addl = [])
    {
        $this->addl = $addl;
    }
    public function get($name = null)
    {
        if ($name !== null) {
            return (isset($this->addl[$name])) ? $this->addl[$name] : null;
        } else {
            return $this->addl;
        }
    }

    public abstract function execute($input);
}
