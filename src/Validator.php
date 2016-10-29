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

    public function execute($input, array $rules = [], array $messages = [])
    {
        // Make our rule set
        $set = [];

        foreach ($rules as $key => $ruleString) {
            $set[$key] = new Rule($key, $ruleString);
        }

        // Go through the set and execute all check
        $failures = [];
        foreach ($set as $key => $rule) {
            if ($rule->isRequired() === true && (isset($input[$key]) === false || empty($input[$key]) === true)) {
                $rule->addFailure(new \Psecio\Validation\Check\Required());
                $failures[$key] = $rule;
                if (!isset($input[$key])) {
                    continue;
                }
            }

            $result = $rule->execute($input[$key]);
            if ($result === false) {
                $failures[$key] = $rule;
            }
        }
        $this->failures = $failures;

        return (count($this->failures) == 0);
    }
}
