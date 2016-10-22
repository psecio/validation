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
        }
    }

    public function errors()
    {
        return $this->failures;
    }

    public function execute($input, array $rules = [], array $messages = [])
    {
        // Make our rule set
        $set = [];

        foreach ($rules as $key => $ruleString) {
            $set[$key] = new Rule($ruleString);
        }

        // Go through the set and execute all check
        $failures = [];
        foreach ($set as $key => $rule) {
            if ($rule->isRequired() && (!isset($input[$key]) || empty($input[$key]))) {
                $failures[$key] = $rule;
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
