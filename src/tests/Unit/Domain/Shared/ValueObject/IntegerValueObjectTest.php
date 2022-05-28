<?php


namespace Tests\Unit\Domain\Shared\ValueObject;

use InvalidArgumentException;
use Tests\TestCase;
use TypeError;
use Warefy\Domain\Shared\ValueObject\IntegerValueObject;

class IntegerValueObjectTest extends TestCase
{
    public function test_integer_value_object_instantiates()
    {
        $positive = new IntegerValueObject(100);
        $negative =  new IntegerValueObject(-5);

        $this->assertInstanceOf(IntegerValueObject::class, $positive);
        $this->assertInstanceOf(IntegerValueObject::class, $negative);

        $this->assertEquals($positive->value(), 100);
        $this->assertEquals($negative->value(), -5);

        $this->assertTrue($positive->isPositive());
        $this->assertTrue($negative->isNegative());
    }

    public function test_integer_value_object_comparisons_methods()
    {
        $int_value =  new IntegerValueObject(100);

        $this->assertTrue($int_value->equalsTo(new IntegerValueObject(100)));
        $this->assertTrue($int_value->isBiggerThan(new IntegerValueObject(99)));
        $this->assertTrue($int_value->isLessThan(new IntegerValueObject(101)));
        $this->assertTrue($int_value->isBiggerThanOrEquals(new IntegerValueObject(100)));
        $this->assertTrue($int_value->isLessThanOrEquals(new IntegerValueObject(100)));
    }


    public function test_integer_value_object_arithmetic_methods()
    {
        $int_value =  new IntegerValueObject(100);

        $this->assertEquals($int_value->sum(new IntegerValueObject(10))->value(), 110);
        $this->assertEquals($int_value->subtract(new IntegerValueObject(101))->value(), -1);
    }

    public function test_integer_value_object_throws_type_error_when_value_is_not_int()
    {
        $this->expectException(TypeError::class);

        new IntegerValueObject("not an integer");
    }
}
