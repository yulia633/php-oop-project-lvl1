<?php

use Hexlet\Validator\Validator;

require_once 'vendor/autoload.php';

$v = new Validator();
$schema = $v->array();

$schema->sizeof(2);

var_dump($schema->isValid([1, 2, 3]));
var_dump($schema->isValid([1, 2]));
