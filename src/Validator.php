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

    public function execute($input, $rules = [])
    {
        // Make our rule set
        $set = new RuleSet();
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

        return (count($failures) > 0);
    }
}
