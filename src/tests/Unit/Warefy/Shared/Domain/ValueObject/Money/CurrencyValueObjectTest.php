<?php

namespace Tests\Unit\Warefy\Shared\Domain\ValueObject\Money;

use Tests\TestCase;
use Warefy\Shared\Domain\Enum\Currency as CurrencyEnum;
use Warefy\Shared\Domain\ValueObject\Money\Currency;

class CurrencyValueObjectTest extends TestCase
{

    public function test_currency_value_object_instantiates_with_supported_currency(): void
    {
        $eur = new Currency(CurrencyEnum::EUR);
        $this->assertTrue($eur->is(CurrencyEnum::EUR));

        $usd = new Currency(CurrencyEnum::USD);
        $this->assertTrue($usd->is(CurrencyEnum::USD));
    }

    public function test_currency_value_object_comparison_operators(): void
    {
        $eur = new Currency(CurrencyEnum::EUR);
        $usd = new Currency(CurrencyEnum::USD);

        $this->assertTrue($eur->equalsTo(new Currency(CurrencyEnum::EUR)));
        $this->assertTrue($usd->equalsTo(new Currency(CurrencyEnum::USD)));

        $this->assertTrue($eur->notEqualsTo(new Currency(CurrencyEnum::USD)));
    }
}
