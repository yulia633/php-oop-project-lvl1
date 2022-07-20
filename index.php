<?php

use Hexlet\Validator\Validator;

require_once 'vendor/autoload.php';

$v = new Validator();
$schema = $v->number();

// var_dump($schema);





// var_dump($schema->isValid(null)); // true

// $schema->required();

// var_dump($schema->isValid('hexlet'));

// // var_dump($schema->isValid(null)); // false

// // Достаточно работать с типом Integer
// var_dump($schema->isValid(7)); // true

// var_dump($schema->positive()->isValid(10)); // true

$schema->range(-5, 5);

var_dump($schema->isValid(-3)); // false
var_dump($schema->isValid(5)); // true
