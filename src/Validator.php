<?php

namespace Hexlet\Validator;

use Hexlet\Validator\Schemas\StringSchema;
use Hexlet\Validator\Schemas\NumberSchema;
use Hexlet\Validator\Schemas\ArraySchema;

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

    public function array(): ArraySchema
    {
        return new ArraySchema();
    }
}
