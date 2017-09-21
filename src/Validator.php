<?php

namespace Psecio\Validation;

abstract class Validator
{
    public static function getInstance($type = null)
    {
        if ($type === null) {
            return new \Psecio\Validation\Validator\Simple();
        } else {
            // get a more complex one
            $parts = explode('.', $type);
            $validatorNs = '\\Psecio\\Validation\\Validator';
            foreach ($parts as $part) {
                $validatorNs .= '\\'.ucwords($part);
            }
            if (!class_exists($validatorNs)) {
                throw new \InvalidArgumentException('Invalid validator type: '.$type);
            }
            return new $validatorNs();
        }
    }

    public function errors($raw = false)
    {
        if ($raw === true) {
            return $this->failures;
        }

        $messages = [];
        foreach ($this->failures as $key => $rule) {
            $messages[$key] = $rule->getFailures();
        }
        return $messages;
    }

    /**
     * Flatten out the error messages into a single level array
     *
     * @return array Error set without keys
     */
    public function errorArray()
    {
        $messages = [];
        foreach ($this->failures as $key => $rule) {
            foreach ($rule->getFailures() as $fail) {
                $messages[] = $fail;
            }
        }
        return $messages;
    }

    public function execute($input, array $rules = [], array $messages = [])
    {
        // Make our rule set
        $set = [];

        foreach ($rules as $key => $ruleString) {
            $rule = new Rule($key, $ruleString, $input, $messages);
            $set[$key] = $rule;
        }

        // Go through the set and execute all check
        $failures = [];
        foreach ($set as $key => $rule) {
            $result = $rule->execute($input[$key]);
            if ($result === false) {
                $failures[$key] = $rule;
            }
        }
        $this->failures = $failures;

        return (count($this->failures) == 0);
    }
}
