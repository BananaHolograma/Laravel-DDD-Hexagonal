<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject;


class IntegerValueObject
{
    public function __construct(protected int $value)
    {
    }

    public function isBiggerThan(int $value): bool
    {
        return $this->value() > $value;
    }

    public function isLessThan(int $value): bool
    {
        return $this->value() < $value;
    }

    public function isBiggerThanOrEquals(int $value): bool
    {
        return $this->value() >= $value;
    }

    public function isLessThanOrEquals(int $value): bool
    {
        return $this->value() <= $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
