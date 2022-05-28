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

    public function equalsTo(IntegerValueObject $other): bool
    {
        return $this->value() === $other->value();
    }

    public function isBiggerThan(IntegerValueObject $other): bool
    {
        return $this->value() > $other->value();
    }

    public function isLessThan(IntegerValueObject $other): bool
    {
        return $this->value() < $other->value();
    }

    public function isBiggerThanOrEquals(IntegerValueObject $other): bool
    {
        return $this->value() >= $other->value();
    }

    public function isLessThanOrEquals(IntegerValueObject $other): bool
    {
        return $this->value() <= $other->value();
    }

    public function sum(IntegerValueObject $other): self
    {
        return new self($this->value() + $other->value());
    }

    public function subtract(IntegerValueObject $other): self
    {
        return new self($this->value() - $other->value());
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
