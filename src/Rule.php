<?php

namespace Psecio\Validation;

abstract class Rule
{
    public abstract function execute($input);
}
