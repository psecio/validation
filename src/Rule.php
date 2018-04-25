<?php

namespace Psecio\Validation;

class Rule
{
    protected $checks;
    protected $key;
    protected $data = [];
    protected $failures = [];
    protected $checkMap = [
        'array' => 'IsArray'
    ];
    protected $messages = [];

    public function __construct($key, $ruleString = null, array $data = [], array $messages = [])
    {
        $this->key = $key;
        $this->setData($data);

        if ($ruleString !== null) {
            $this->setChecks($this->parse($ruleString));
        }
        $this->setMessages($messages);
    }

    public function setChecks(CheckSet $set)
    {
        $this->checks = $set;
    }

    public function getChecks($raw = false)
    {
        return ($raw === true) ? $this->checks : $this->checks->toArray();
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }
    public function getData()
    {
        return $this->data;
    }

    public function setMessages(array $messages)
    {
        $this->messages = $messages;
    }
    public function getMessages()
    {
        return $this->messages;
    }
    public function getMessage($key)
    {
        return ($this->hasMessage($key) == true) ? $this->messages[$key] : null;
    }
    public function hasMessage($key)
    {
        return (isset($this->messages[$key]));
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
    public function getFailures($raw = false)
    {
        if ($raw === true) {
            return $this->failures;
        }
        // Otherwise, get the string values
        $messages = [];
        foreach ($this->failures as $check) {
            if ($this->hasMessage($this->key) === true) {
                $message = $this->getMessage($this->key);
                if (is_array($message) && isset($message[$check->getType()])) {
                    $message = $message[$check->getType()];
                }
                $messages[] = str_replace(':name', $this->key, $message);
            } else {
                $messages[] = $check->getMessage($this->key);
            }
        }

        return $messages;
    }
    public function isFailed()
    {
        return count($this->getFailures()) > 0;
    }
    public function removeCheck($index)
    {
        $this->checks->remove($index);
    }

    public function isRequired($remove = false)
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

    public function failRequired()
    {
        foreach ($this->getChecks() as $index => $check) {
            if ($check instanceof \Psecio\Validation\Check\Required) {
                $this->addFailure($check);
                return true;
            }
        }
        return false;
    }

    public function parse($ruleString)
    {
        $checks = new CheckSet();
        $parts = (!is_array($ruleString)) ? explode('|', $ruleString) : $ruleString;
        $addl = [];

        foreach ($parts as $part) {
            if (is_object($part)) {
                $data = $this->getData();
                $part->setAdditional($data);
                $check = $part;
            } else {
                if (strstr($part, '[') !== false && strstr($part, ']') !== false) {
                    preg_match('/(.+)\[(.+?)\]/', $part, $matches);
                    $addl = array_merge($addl, explode(',', $matches[2]));
                    $part = $matches[1];
                }

                if (isset($this->checkMap[$part])) {
                    $part = $this->checkMap[$part];
                }
                $checkNs = '\\Psecio\\Validation\\Check\\'.ucwords(strtolower($part));
                if (!class_exists($checkNs)) {
                    throw new \InvalidArgumentException('Check type "'.$part.'" is invalid');
                }
                $check = new $checkNs($this->key, $this->getData(), $addl);
            }

            // Reset the additional values based on the param types
            $addl = $check->get();
            $params = $check->getParams();
            if (!empty($params)) {
                $check->setAdditional(array_combine($params, $addl));
            }
            $checks->add($check);
        }
        return $checks;
    }
}
