<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Schemas\StringSchema;
use Hexlet\Validator\Schemas\NumberSchema;

class Validator
{
    public function string(): StringSchema
    {
        return new StringSchema();
    }

    public function number(): NumberSchema
    {
        return new NumberSchema();
    }
}
