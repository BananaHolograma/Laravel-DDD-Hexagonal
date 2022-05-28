<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject;

use InvalidArgumentException;

class Currency extends StringValueObject
{
    const USD = 'USD';
    const EUR = 'EUR';

    public function __construct(protected string $value)
    {
        if (!in_array($value, $this->getAvailableCurrencies())) {
            throw new InvalidArgumentException("Currency {$value} should be a valid one: " . implode(',', $this->getAvailableCurrencies()));
        }
    }

    public function getAvailableCurrencies(): array
    {
        return [self::USD, self::EUR];
    }
}
