<?php

namespace Psecio\Validation;

class CheckSet implements \Iterator, \Countable, \ArrayAccess
{
    private $checks = [];
    private $index = 0;

    public function __construct(array $checks = [])
    {
        $this->setChecks($checks);
    }

    public function setChecks(array $checks)
    {
        $this->checks = $checks;
    }
    public function add(Check $check)
    {
        $this->checks[] = $check;
    }
    public function remove($index)
    {
        unset($this->checks[$index]);
    }
    public function toArray()
    {
        return array_values($this->checks);
    }

    public function next()
    {
        $this->index++;
    }
    public function current()
    {
        return $this->checks[$this->index];
    }
    public function rewind()
    {
        $this->index = 0;
    }
    public function valid()
    {
        return isset($this->checks[$this->index]);
    }
    public function key()
    {
        return $this->index;
    }

    public function count()
    {
        return count($this->checks);
    }

    public function offsetExists($offset)
    {
        return isset($this->checks[$offset]);
    }
    public function offsetGet($offset)
    {
        return $this->checks[$offset];
    }
    public function offsetSet($offset, $value)
    {
        return $this->checks[$offset] = $value;
    }
    public function offsetUnset($offset)
    {
        unset($this->checks[$offset]);
    }
}
