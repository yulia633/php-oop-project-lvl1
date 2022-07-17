<?php

use Hexlet\Validator\Validator;

require_once 'vendor/autoload.php';

$v = new Validator();

$schema = $v->string();
// Каждый вызов возвращает новую схему,
// так как у нас может быть любое количество независимых проверок
$schema2 = $v->string(); // $schema != $schema2

// var_dump($schema);
// var_dump($schema2);
// die;


$schema->isValid(''); // true
// var_dump($schema->isValid('')); // true
// die;

// Null валидное значение для всех валидаторов
// если не задан required
$schema->isValid(null); // true
// var_dump($schema->isValid(null)); // true
// die;

$schema->isValid('what does the fox say'); // true

$schema->required();

$schema2->isValid(''); // По прежнему валидно, это другая схема
$schema->isValid(null); // А тут не валидно
$schema->isValid(''); // И тут тоже

$schema->isValid('hexlet'); // true

$data1 = $schema->contains('what')->isValid('what does the fox say'); // true
$data2 = $schema->contains('whatthe')->isValid('what does the fox say'); // false
// var_dump($data1); // true
// var_dump($data2); // true
// die;


// Если один валидатор вызывался несколько раз
// то последний имеет приоритет (перетирает предыдущий)
$data = $v->string()->minLength(10)->minLength(5)->isValid('Hexlet'); // true

var_dump($data);
