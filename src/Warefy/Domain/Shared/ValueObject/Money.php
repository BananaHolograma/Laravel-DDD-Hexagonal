<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject;

use InvalidArgumentException;

class Money
{
    const USD = 'USD';
    const EUR = 'EUR';

    protected string $currency;
    protected int $original;
    protected float $value;
    /**
     *
     */
    public function __construct(int $value, ?string $currency = self::EUR)
    {
        if (!in_array($currency, $this->getAvailableCurrencies())) {
            throw new InvalidArgumentException("Currency {$currency} should be a valid one: " . $this->getAvailableCurrencies() . implode(','));
        }

        $this->currency = $currency;
        $this->original = $value;
        $this->value = (float) round($value / 100, 2);
    }

    public function valueFormatted(): string
    {
        return number_format($this->value(), 2);
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function original(): int
    {
        return $this->original;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function getAvailableCurrencies(): array
    {
        return [self::USD, self::EUR];
    }
}
