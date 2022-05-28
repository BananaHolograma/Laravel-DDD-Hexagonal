<?php


namespace Tests\Unit\Domain\Shared\ValueObject\Money;

use Tests\TestCase;
use Warefy\Domain\Shared\Enum\Currency as CurrencyEnum;
use Warefy\Domain\Shared\ValueObject\Generic\IntegerValueObject;
use Warefy\Domain\Shared\ValueObject\Money\Currency;
use Warefy\Domain\Shared\ValueObject\Money\Money;

class MoneyValueObjectTest extends TestCase
{
    public function test_money_value_object_instantiates_with_default_currency()
    {
        $money = new Money(new IntegerValueObject(256));

        $this->assertEquals($money->currency()->value(), CurrencyEnum::EUR);
        $this->assertEquals(2.56, $money->amount()->value());
        $this->assertEquals(256, $money->original()->value());
        $this->assertEquals("2.56", $money->formatted()->value());
    }

    public function test_money_value_object_instantiates_with_defined_currency()
    {
        $money = new Money(new IntegerValueObject(256), new Currency(CurrencyEnum::USD));

        $this->assertEquals($money->currency()->value(), CurrencyEnum::USD);
    }

    public function test_money_value_object_equality_methods()
    {
        $money = new Money(new IntegerValueObject(256));

        $this->assertTrue($money->isEqualsTo(new Money(new IntegerValueObject(256))));
        $this->assertFalse($money->isEqualsTo(new Money(new IntegerValueObject(333))));
        $this->assertTrue($money->notEqualsTo(new Money(new IntegerValueObject(333))));
    }

    public function test_money_value_object_arithmetic_methods()
    {
        $money = new Money(new IntegerValueObject(100));
        $other = new Money(new IntegerValueObject(101));

        $this->assertEquals(2.01, $money->add($other)->amount()->value());
        $this->assertEquals(-0.01, $money->subtract($other)->amount()->value());

        $this->assertTrue($money->add($other)->isPositive());
        $this->assertTrue($money->subtract($other)->isNegative());
    }
}
