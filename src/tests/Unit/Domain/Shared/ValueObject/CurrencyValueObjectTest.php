<?php


namespace Tests\Unit\Domain\Shared\ValueObject;

use Tests\TestCase;
use Warefy\Domain\Shared\ValueObject\Currency;
use InvalidArgumentException;
use Warefy\Domain\Shared\ValueObject\StringValueObject;

class CurrencyValueObjectTest extends TestCase
{

    public function test_currency_value_object_instantiates_with_supported_currency()
    {
        $currency = new Currency('EUR');
        $this->assertEquals('EUR', $currency->value());

        $currency = new Currency('USD');
        $this->assertEquals('USD', $currency->value());

        $this->assertEquals(['USD', 'EUR'], $currency->getAvailableCurrencies());
    }

    public function test_currency_value_object_throws_invalid_argument_exception_when_currency_is_not_supported()
    {
        $this->expectException(InvalidArgumentException::class);
        new Currency('NULL');
    }
}
