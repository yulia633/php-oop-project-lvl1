<?php

namespace Hexlet\Validator\Validator\Tests;

use PHPUnit\Framework\TestCase;
use Hexlet\Validator\Validator;

class NumberTest extends TestCase
{
    private Validator $validator;

    public function setUp(): void
    {
        $this->validator = new Validator();
    }

    public function testMain(): void
    {
        $schema = $this->validator->number();

        $this->assertTrue($schema->isValid(null));
        $this->assertTrue($schema->isValid(0));
        $this->assertTrue($schema->isValid(33));

        $this->assertFalse($schema->isValid('test test'));
    }

    public function testRequired(): void
    {
        $schema = $this->validator->number();

        $this->assertTrue($schema->isValid(null));
        $schema->required();
        $this->assertFalse($schema->isValid(null));
    }

    public function testPositive(): void
    {
        $schema = $this->validator->number();

        $this->assertTrue($schema->isValid(-999));

        $schema->positive();

        $this->assertFalse($schema->isValid(0));
        $this->assertFalse($schema->isValid(-999));
    }

    public function testRange(): void
    {
        $schema = $this->validator->number();

        $schema->positive()->isValid(10);

        $schema->range(-5, 5);

        $this->assertFalse($schema->isValid(-3));
        $this->assertTrue($schema->isValid(5));
    }
}
