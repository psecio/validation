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
     * Current check message (for failures)
     * @var string
     */
    public $message = '';

    protected $input = [];
    protected $key = '';

    /**
     * Init the object and set additional values if provided
     *
     * @param array $addl Set of additional values
     */
    public function __construct($key, $input = null, array $addl = [])
    {
        $this->setAdditional($addl);
        $this->setInput($input);
        $this->setKey($key);
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

    public function setInput($input)
    {
        $this->input = $input;
    }
    public function getInput()
    {
        return $this->input;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get the "type" of the validation (based on class name)
     *
     * @return string Check class "type"
     */
    public function getType()
    {
        return strtolower(str_replace(
            [__NAMESPACE__, '\\', 'Check'],
            '',
            get_called_class()
        ));
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
     * Get the value of the message for the check
     *
     * @param string $name Key name for the field
     * @return string Formatted/default message
     */
    public function getMessage($name = null)
    {
        if ($name === null) {
            return $this->message;
        }
        return str_replace(':name', $name, $this->message);
    }

    /**
     * Execute method to be overridden by the child "check" class
     *
     * @param mixed $input Input under evaluation
     * @return boolean Pass/fail of the evaluation
     */
    public abstract function execute($input);
}
