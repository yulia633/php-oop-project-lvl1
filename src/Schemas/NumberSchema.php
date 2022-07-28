<?php

declare(strict_types=1);

namespace Hexlet\Validator\Schemas;

class NumberSchema
{
    protected array $rules = [];

    public function __construct()
    {
        $this->rules[] = fn (mixed $value) => is_null($value) || !is_string($value);
    }

    public function required(): self
    {
        $this->rules['required'] = fn (mixed $value) => is_numeric($value);
        return $this;
    }

    public function positive(): self
    {
        $this->rules['positive'] = fn (int|null $value) => $value === null || $value > 0;
        return $this;
    }

    public function range(int $min, int $max): self
    {
        $this->rules['range'] = fn (int $value) => $value >= $min && $value <= $max;
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
