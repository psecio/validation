<?php

namespace Psecio\Validate;

abstract class Rule
{
    public abstract function execute($input);
}
