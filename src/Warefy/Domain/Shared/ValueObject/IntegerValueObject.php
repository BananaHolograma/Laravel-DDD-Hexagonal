<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject;


class IntegerValueObject
{
    public function __construct(protected int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(IntegerValueObject $other_value): bool
    {
        return $this->value() === $other_value;
    }

    public function isBiggerThan(IntegerValueObject $other_value): bool
    {
        return $this->value() > $other_value;
    }

    public function isLessThan(IntegerValueObject $other_value): bool
    {
        return $this->value() < $other_value->value();
    }

    public function isBiggerThanOrEquals(IntegerValueObject $other_value): bool
    {
        return $this->value() >= $other_value->value();
    }

    public function isLessThanOrEquals(IntegerValueObject $other_value): bool
    {
        return $this->value() <= $other_value->value();
    }

    public function sum(IntegerValueObject $other_value): self
    {
        return new self($this->value() + $other_value->value());
    }

    public function subtract(IntegerValueObject $other_value): self
    {
        return new self($this->value() - $other_value->value());
    }

    public function isPositive(): bool
    {
        return $this->value() > 0;
    }

    public function isNegative(): bool
    {
        return $this->value() < 0;
    }
}
