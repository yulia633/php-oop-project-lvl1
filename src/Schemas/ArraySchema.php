<?php

declare(strict_types=1);

namespace Hexlet\Validator\Schemas;

class ArraySchema
{
    protected array $rules = [];

    public function __construct()
    {
        $this->rules[] = fn (mixed $value) => is_null($value) || is_array($value);
    }

    public function required(): self
    {
        $this->rules['required'] = fn (mixed $value) => is_array($value);
        return $this;
    }

    public function sizeof(int $length): self
    {
        $this->rules['sizeof'] = fn (array $value) => count($value) === $length;
        return $this;
    }

    public function isValid(mixed $value): bool
    {
        $flag = true;

        foreach ($this->rules as $rule) {
            if (!$rule($value)) {
                $flag = false;
                break;
            }
        }

        return $flag;
    }
}
