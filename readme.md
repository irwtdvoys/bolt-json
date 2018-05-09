# Bolt-JSON (v0.1.0)

## What is it?

A simple wrapper for dealing with JSON in PHP with built in error handling.

## Installation

Can be installed using composer by running the following:

```sh
$ composer require cruxoft/bolt-json
```

## Usage

Simple usage involves calling static `encode` and `decode` methods however initial work on an OOP interface has been included.

### Encode

```php
use Bolt\Json;

try
{
    $json = Json::encode(array("hello" => "world"));
}
catch (\Exception $exception)
{
    die($exception->getMessage());
}

var_dump($json);
```

Outputs: 

```
string(17) "{"hello":"world"}"
```

### Decode

```php
use Bolt\Json;

try
{
    $json = Json::decode('{"hello":"world"}');
}
catch (\Exception $exception)
{
    die($exception->getMessage());
}

var_dump($json);
```

Outputs:

```
object(stdClass)#3 (1) {
  ["hello"]=>
  string(5) "world"
}
```

### Validate

```php
use Bolt\Json;

var_dump(Json::validate('{"hello":"world"}'));
var_dump(Json::validate('{"hello":"world"x}'));
```

Outputs:

```
bool(true)
bool(false)
```

### OOP

The class constructor takes either encoded or decoded data and allows manipulation of the data and output.

Very much a work in progress.

```php
use Bolt\Json;

$json = new Json(array("hello" => "world"));
var_dump($json->toString());
```
