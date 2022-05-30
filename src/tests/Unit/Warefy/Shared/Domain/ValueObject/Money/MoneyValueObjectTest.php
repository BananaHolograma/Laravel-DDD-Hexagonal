<?php


namespace Tests\Unit\Warefy\Shared\Domain\ValueObject\Money;

use Tests\TestCase;
use Warefy\Shared\Domain\Enum\Currency as CurrencyEnum;
use Warefy\Shared\Domain\ValueObject\Generic\IntegerValueObject;
use Warefy\Shared\Domain\ValueObject\Money\Currency;
use Warefy\Shared\Domain\ValueObject\Money\Money;

class MoneyValueObjectTest extends TestCase
{
    public function test_money_value_object_instantiates_with_default_currency(): void
    {
        $money = new Money(new IntegerValueObject(256));

        $this->assertEquals(CurrencyEnum::EUR, $money->currency()->value());
        $this->assertEquals(2.56, $money->amount()->value());
        $this->assertEquals(256, $money->original()->value());
        $this->assertEquals("2.56", $money->formatted()->value());
    }

    public function test_money_value_object_instantiates_with_defined_currency(): void
    {
        $money = new Money(new IntegerValueObject(256), new Currency(CurrencyEnum::USD));
        $this->assertEquals(CurrencyEnum::USD, $money->currency()->value());

        $money = new Money(new IntegerValueObject(256), new Currency(CurrencyEnum::GBP));
        $this->assertEquals(CurrencyEnum::GBP, $money->currency()->value());
    }

    public function test_money_value_object_equality_methods(): void
    {
        $money = new Money(new IntegerValueObject(256));

        $this->assertTrue($money->isEqualsTo(new Money(new IntegerValueObject(256))));
        $this->assertFalse($money->isEqualsTo(new Money(new IntegerValueObject(333))));
        $this->assertTrue($money->notEqualsTo(new Money(new IntegerValueObject(333))));
    }

    public function test_money_value_object_arithmetic_methods(): void
    {
        $money = new Money(new IntegerValueObject(100));
        $other = new Money(new IntegerValueObject(101));

        $this->assertEquals(2.01, $money->add($other)->amount()->value());
        $this->assertEquals(-0.01, $money->subtract($other)->amount()->value());

        $this->assertTrue($money->add($other)->isPositive());
        $this->assertTrue($money->subtract($other)->isNegative());
    }
}
