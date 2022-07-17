<?php

declare(strict_types=1);

namespace Hexlet\Validator\Schemas;

class StringSchema
{
    protected array $rules = [];

    public function required(): self
    {
        $this->rules['required'] = fn (mixed $value) => is_string($value) && $value !== '';
        return $this;
    }

    public function contains(string $substring): self
    {
        $this->rules['contains'] = fn (string $value) => mb_strpos($value, $substring) !== false;
        return $this;
    }

    public function minLength(int $length): self
    {
        $this->rules['minLength'] = fn (string $value) => mb_strlen($value) >= $length;
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
