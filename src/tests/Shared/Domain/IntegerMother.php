<?php

namespace Tests\Shared\Domain;

class IntegerMother
{
    public static function create(): int {
        return self::between(1, 100);
    }

    public static function between(int $min = 1, int $max = PHP_INT_MAX): int {
        return MotherCreator::random()->numberBetween($min, $max);
    }
}
