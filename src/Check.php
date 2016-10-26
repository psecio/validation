<?php

namespace Psecio\Validation;

abstract class Check
{
    /**
     * Additional paramters
     * @var array
     */
    protected $addl = [];

    /**
     * Parameter names for additional values
     * @var array
     */
    public $params = [];

    /**
     * Init the object and set additional values if provided
     *
     * @param array $addl Set of additional values
     */
    public function __construct(array $addl = [])
    {
        $this->setAdditional($addl);
    }

    /**
     * Set the current additional values
     *
     * @param array $addl Set of additional values
     */
    public function setAdditional(array $addl)
    {
        $this->addl = $addl;
    }

    /**
     * Get a value from the additional value set
     * If the "name" value is given, it tries to locate the value, returns null if not found
     * If no "name" is given, returns all values
     *
     * @param string $name Name of value to locate [optional]
     * @return mixed Either all values, the value if found or null if not found
     */
    public function get($name = null)
    {
        if ($name !== null) {
            return (isset($this->addl[$name])) ? $this->addl[$name] : null;
        } else {
            return $this->addl;
        }
    }

    /**
     * Get the current "parameters" values
     *
     * @return array Set of parameters
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Execute method to be overridden by the child "check" class
     *
     * @param mixed $input Input under evaluation
     * @return boolean Pass/fail of the evaluation
     */
    public abstract function execute($input);
}
