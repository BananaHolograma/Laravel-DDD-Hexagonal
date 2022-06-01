<?php


namespace Tests\Shared\Domain\ValueObject\Generic;

use Tests\TestCase;
use TypeError;
use Shared\Domain\ValueObject\Generic\IntegerValueObject;

class IntegerValueObjectTest extends TestCase
{
    public function test_integer_value_object_instantiates(): void
    {
        $positive = new IntegerValueObject(100);
        $negative =  new IntegerValueObject(-5);

        $this->assertInstanceOf(IntegerValueObject::class, $positive);
        $this->assertInstanceOf(IntegerValueObject::class, $negative);

        $this->assertEquals(100, $positive->value());
        $this->assertEquals(-5 , $negative->value());

        $this->assertTrue($positive->isPositive());
        $this->assertTrue($negative->isNegative());
    }

    public function test_integer_value_object_comparisons_methods(): void
    {
        $int_value =  new IntegerValueObject(100);

        $this->assertTrue($int_value->equalsTo(new IntegerValueObject(100)));
        $this->assertTrue($int_value->isBiggerThan(new IntegerValueObject(99)));
        $this->assertTrue($int_value->isLessThan(new IntegerValueObject(101)));
        $this->assertTrue($int_value->isBiggerThanOrEquals(new IntegerValueObject(100)));
        $this->assertTrue($int_value->isLessThanOrEquals(new IntegerValueObject(100)));
    }


    public function test_integer_value_object_arithmetic_methods(): void
    {
        $int_value =  new IntegerValueObject(100);

        $this->assertEquals( 110,$int_value->sum(new IntegerValueObject(10))->value());
        $this->assertEquals(-1, $int_value->subtract(new IntegerValueObject(101))->value());
    }

    public function test_integer_value_object_throws_type_error_when_value_is_not_int(): void
    {
        $this->expectException(TypeError::class);
        new IntegerValueObject("not an integer");
    }
}
