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
