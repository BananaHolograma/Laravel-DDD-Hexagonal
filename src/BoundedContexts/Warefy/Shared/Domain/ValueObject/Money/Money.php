<?php

declare(strict_types=1);

namespace Warefy\Shared\Domain\ValueObject\Money;

use InvalidArgumentException;
use Warefy\Shared\Domain\Enum\Currency as CurrencyEnum;
use Warefy\Shared\Domain\ValueObject\Generic\IntegerValueObject;
use Warefy\Shared\Domain\ValueObject\Generic\StringValueObject;
use Warefy\Shared\Domain\ValueObject\Number\Real;

class Money
{
    protected Real $amount;

    public function __construct(
        protected IntegerValueObject $original,
        protected ?Currency $currency = null
    ) {
        $this->currency = $currency ?? new Currency(CurrencyEnum::EUR);
        $this->amount = new Real((float) round($original->value() / 100, 2));
    }

    public function amount(): Real
    {
        return $this->amount;
    }

    public function formatted(): StringValueObject
    {
        return new StringValueObject(number_format($this->amount()->value(), 2));
    }

    public function currency(): Currency
    {
        return $this->currency;
    }

    public function original(): IntegerValueObject
    {
        return $this->original;
    }

    public function isEqualsTo(Money $money): bool
    {
        return $this->original()->equalsTo($money->original()) && $this->hasSameCurrency($money);
    }

    public function notEqualsTo(Money $money): bool
    {
        return !$this->isEqualsTo($money);
    }

    private function hasSameCurrency(Money $money): bool
    {
        return $this->currency()->equalsTo($money->currency());
    }

    public function add(Money $money): self
    {
        if (!$this->hasSameCurrency($money)) {
            throw new InvalidArgumentException(
                "You can only sum values with the same currency: {$this->currency()} !== {$money->currency()}."
            );
        }

        return new self($this->original()->sum($money->original()), $this->currency());
    }

    public function subtract(Money $money): self
    {
        if (!$this->hasSameCurrency($money)) {
            throw new InvalidArgumentException(
                "You can only subtract values with the same currency: {$this->currency()} !== {$money->currency()}."
            );
        }

        return new self($this->original()->subtract($money->original()), $this->currency());
    }

    public function isNegative(): bool
    {
        return $this->original()->isNegative();
    }

    public function isPositive(): bool
    {
        return $this->original()->isPositive();
    }
}
