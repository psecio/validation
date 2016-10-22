<?php

namespace Psecio\Validation;

class Rule
{
    protected $checks;
    protected $failures = [];
    protected $checkMap = [
        'array' => 'IsArray'
    ];

    public function __construct($ruleString = null)
    {
        if ($ruleString !== null) {
            $this->setChecks($this->parse($ruleString));
        }
    }

    public function setChecks(CheckSet $set)
    {
        $this->checks = $set;
    }

    public function getChecks($raw = false)
    {
        return ($raw === true) ? $this->checks : $this->checks->toArray();
    }

    public function execute($input)
    {
        foreach ($this->getChecks() as $check) {
            if ($check->execute($input) === false) {
                $this->addFailure($check);
            }
        }
        return ($this->isFailed() === true) ? false : true;
    }

    public function addFailure(Check $check)
    {
        $this->failures[] = $check;
    }
    public function getFailures()
    {
        return $this->failures;
    }
    public function isFailed()
    {
        return count($this->getFailures()) > 0;
    }
    public function removeCheck($index)
    {
        $this->checks->remove($index);
    }

    public function isRequired($remove = true)
    {
        foreach ($this->getChecks() as $index => $check) {
            if ($check instanceof \Psecio\Validation\Check\Required) {
                if ($remove === true) {
                    $this->removeCheck($index);
                }
                return true;
            }
        }
        return false;
    }

    public function parse($ruleString)
    {
        $checks = new CheckSet();
        $parts = explode('|', $ruleString);

        foreach ($parts as $part) {
            $addl = [];

            if (strstr($part, '[') !== false && strstr($part, ']') !== false) {
                preg_match('/(.+)\[(.+?)\]/', $part, $matches);
                $addl = explode(',', $matches[2]);
                $part = $matches[1];
            }

            if (isset($this->checkMap[$part])) {
                $part = $this->checkMap[$part];
            }
            $checkNs = '\\Psecio\\Validation\\Check\\'.ucwords(strtolower($part));
            if (!class_exists($checkNs)) {
                throw new \InvalidArgumentException('Check type "'.$part.'" is invalid');
            }
            $check = new $checkNs($addl);
            $checks->add($check);
        }
        return $checks;
    }
}
