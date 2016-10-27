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

#### numeric
Checks to ensure the value provided is numeric (integer, float, etc)

#### integer
Checks for integer-only values. Can also include minimum and maximum values:

```php
// Minimum of 1, max of 10
$rules = ['mynumber' => 'integer[1,10]'];
```

#### boolean
Checks for boolean values (`true`, `false`, `0`, `1` and strings `'0'`, `'1'`)

#### array
Checks to ensure the value provided is an array

#### length
Checks the value to ensure the (string) length matches requirements. You must provide a minimum value, but a maximum can also be defined

```php
// Using just the minimum, checking for a length of at least 3
$rules = ['mystring' => 'length[3]']

// Using both minimum and maximum, check for a length between 3 and 10
$rules = ['mystring' => 'length[3,10]']
```

#### date
Checks to be sure the value given is a *date* (as parsed by [strtotime](http://php.net/strtotime))

#### before
Checks to see if the value (a parseable date) is before the date provided (as parsed by [strtotime](http://php.net/strtotime))

```php
// Check to see if the date provided is before yesterday
$rules = [
    'myinputdate' => 'before[yesterday]'
];
```

#### after
Checks to see if the value (a parseable date) is after the date provided (as parsed by [strtotime](http://php.net/strtotime))

```php
// Check to see if the date is in the last three days
$rules = [
    'myinputdate' => 'after[-3 days]'
];
```

### in
Checks to ensure the value provided is in a set of values

```php
// Check to see if the value is one of "foo", "bar" or "baz"
$rules = [
    'myvalue' => 'in[foo,bar,baz]'
]
```

#### json
Checks to be sure the value is a valid JSON formatted string (using [json_decode](http://php.net/json_decode))

#### required
Checks to be sure the value exists

#### ip
Checks to ensure the value provided is a valid IPv4 or IPv6 formatted address

#### email
Check to ensure the value provided is a validly formatted email address

#### regex
Check to ensure the value matches a certain regular expression at least once

```php
$rules = [
    'mystring' => 'regex[/[0-9a-z]+/]'
]
```
