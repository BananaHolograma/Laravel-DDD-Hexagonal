<?php

declare(strict_types=1);

namespace Warefy\Shared\Domain\ValueObject\Money;

use Warefy\Shared\Domain\Enum\Currency as CurrencyEnum;

class Currency
{
    public function __construct(protected CurrencyEnum $value)
    {
    }

    public function value(): CurrencyEnum
    {
        return $this->value;
    }

    public function equalsTo(Currency $other): bool
    {
        return $this->value() === $other->value();
    }

    public function notEqualsTo(Currency $other): bool
    {
        return !$this->equalsTo($other);
    }

    public function is(CurrencyEnum $value): bool
    {
        return $this->value() === $value;
    }

    public function getAvailableCurrencies(): array
    {
        return $this->value()->cases();
    }
}
