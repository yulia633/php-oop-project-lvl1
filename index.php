<?php

use Hexlet\Validator\Validator;

require_once 'vendor/autoload.php';

$v = new Validator();
$schema = $v->array();

// Позволяет описывать валидацию для ключей массива
$shape = $schema->shape([
    'name' => $v->string()->required(),
    'age' => $v->number()->positive(),
]);

var_dump($schema->isValid(['name' => 'kolya', 'age' => 100])); // true
var_dump($schema->isValid(['name' => 'maya', 'age' => null])); // true
var_dump($schema->isValid(['name' => '', 'age' => null])); // false
var_dump($schema->isValid(['name' => 'ada', 'age' => -5])); // false
