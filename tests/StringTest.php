<?php

namespace Hexlet\Validator\Validator\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator;

class StringTest extends TestCase
{
    private Validator $validator;

    public function setUp(): void
    {
        $this->validator = new Validator();
    }

    public function testMain(): void
    {
        $schema = $this->validator->string();

        $this->assertTrue($schema->isValid(''));
        $this->assertTrue($schema->isValid('what does the fox say'));
        $this->assertTrue($schema->isValid('hexlet'));
    }

    public function testRequired(): void
    {
        $schema = $this->validator->string();

        $this->assertTrue($schema->isValid(null));
        $this->assertTrue($schema->isValid(''));

        $schema->required();

        $this->assertFalse($schema->isValid(null));
        $this->assertFalse($schema->isValid(''));
    }

    public function testContains(): void
    {
        $schema = $this->validator->string();

        $schema->contains('what');
        $this->assertTrue($schema->isValid('what does the fox say'));

        $schema->contains('whatthe');
        $this->assertFalse($schema->isValid('what does the fox say'));
    }

    public function testMinLength(): void
    {
        $schema = $this->validator->string();

        $this->assertTrue($schema->isValid('test'));

        $schema->minLength(12);
        $this->assertFalse($schema->isValid('test'));
    }
}
