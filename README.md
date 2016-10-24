## Psecio/Validation

This library seeks to be a simple and reusable validation library for input based on rules.

### Example

```php
<?php

$v = \Psecio\Validate\Validator::getInstance();

$data = [
    'foo' => 'bar'
];
$rules = [
    'foo' => 'required|alpha'
]

$result = $v->execute($rules, $data);
var_export($result);

?>
```


### Checks

Here is a listing of the check types that Validation supports:

#### alpha
Checks for *only* alpha characters

#### alphanum
Checks for *only* alpha-numeric characters

#### boolean
Checks for boolean values (`true`, `false`, `0`, `1` and strings `'0'`, `'1'`)

#### date
Checks to be sure the value given is a *date* (as parsed by [strtotime](http://php.net/strtotime))

#### integer
Checks for integer-only values

#### array
Checks to ensure the value provided is an array

#### numeric
Checks to ensure the value provided is numeric (integer, float, etc)

#### required
Checks to be sure the value exists
