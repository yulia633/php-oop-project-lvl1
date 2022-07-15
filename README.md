### Hexlet tests and linter status:
[![Actions Status](https://github.com/yulia633/php-oop-project-lvl1/workflows/hexlet-check/badge.svg)](https://github.com/yulia633/php-oop-project-lvl1/actions)

[![Github Actions Status](https://github.com/yulia633/php-oop-project-lvl1/workflows/PHP%20CI/badge.svg)](https://github.com/yulia633/php-oop-project-lvl1/actions)

[![Test Coverage](https://api.codeclimate.com/v1/badges/9aa567c0ff8910595dd4/test_coverage)](https://codeclimate.com/github/yulia633/php-oop-project-lvl1/test_coverage)

[![Maintainability](https://api.codeclimate.com/v1/badges/9aa567c0ff8910595dd4/maintainability)](https://codeclimate.com/github/yulia633/php-oop-project-lvl1/maintainability)

### О коде

Валидация строк, чисел и массивов в соответствии с предопределенными или пользовательскими правилами.

#### Проверка строк

```php

<?php

$v = new \Hexlet\Validator\Validator();

$schema = $v->string();
// Каждый вызов возвращает новую схему,
// так как у нас может быть любое количество независимых проверок
$schema2 = $v->string(); // $schema != $schema2

$schema->isValid(''); // true

// Null валидное значение для всех валидаторов
// если не задан required
$schema->isValid(null); // true

$schema->isValid('what does the fox say'); // true

$schema->required();

$schema2->isValid(''); // По прежнему валидно, это другая схема
$schema->isValid(null); // А тут не валидно
$schema->isValid(''); // И тут тоже

$schema->isValid('hexlet'); // true

$schema->contains('what')->isValid('what does the fox say'); // true
$schema->contains('whatthe')->isValid('what does the fox say'); // false

// Если один валидатор вызывался несколько раз
// то последний имеет приоритет (перетирает предыдущий)
$v->string()->minLength(10)->minLength(5)->isValid('Hexlet'); // true

```
