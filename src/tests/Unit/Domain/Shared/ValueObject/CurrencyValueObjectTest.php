<?php


namespace Tests\Unit\Domain\Shared\ValueObject;

use Tests\TestCase;
use Warefy\Domain\Shared\ValueObject\Currency;
use Warefy\Domain\Shared\Enum\Currency as CurrencyEnum;

class CurrencyValueObjectTest extends TestCase
{

    public function test_currency_value_object_instantiates_with_supported_currency()
    {
        $eur = new Currency(CurrencyEnum::EUR);
        $this->assertTrue($eur->is(CurrencyEnum::EUR));

        $usd = new Currency(CurrencyEnum::USD);
        $this->assertTrue($usd->is(CurrencyEnum::USD));
    }

    public function test_currency_value_object_comparison_operators()
    {
        $eur = new Currency(CurrencyEnum::EUR);
        $usd = new Currency(CurrencyEnum::USD);

        $this->assertTrue($eur->equalsTo(new Currency(CurrencyEnum::EUR)));
        $this->assertTrue($usd->equalsTo(new Currency(CurrencyEnum::USD)));

        $this->assertTrue($eur->notEqualsTo(new Currency(CurrencyEnum::USD)));
    }
}
