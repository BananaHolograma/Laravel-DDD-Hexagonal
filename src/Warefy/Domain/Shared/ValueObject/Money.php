<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject;

use InvalidArgumentException;

class Money
{
    protected float $amount;

    public function __construct(
        protected IntegerValueObject $original,
        protected ?Currency $currency = new Currency('EUR')
    ) {

        $this->amount = (float) round($original->value() / 100, 2);
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function valueFormatted(): StringValueObject
    {
        return new StringValueObject(number_format($this->amount(), 2));
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
        return $this->original() === $money->original() && $this->hasSameCurrency($money);
    }

    private function hasSameCurrency(Money $money): bool
    {
        return trim(strtoupper($this->currency()->value())) === trim(strtoupper($money->currency()->value()));
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
                "You can only sum values with the same currency: {$this->currency()} !== {$money->currency()}."
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
