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
