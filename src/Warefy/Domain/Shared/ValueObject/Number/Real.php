<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject\Number;

use InvalidArgumentException;
use Warefy\Domain\Shared\ValueObject\Generic\IntegerValueObject;

class Real
{
    public function __construct(protected float $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
            throw new InvalidArgumentException("The number {$value} is not real.");
        }
    }

    public function value(): float
    {
        return $this->value;
    }

    public function toNatural(): Natural
    {
        return new Natural((int)round($this->value(), 0));
    }

    public function toInteger(): IntegerValueObject
    {
        return new IntegerValueObject((int)round($this->value(), 0));
    }
}
