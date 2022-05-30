<?php

namespace Tests\Unit\Shared\Domain\ValueObject\Number;

use InvalidArgumentException;
use Tests\TestCase;
use Shared\Domain\ValueObject\Number\Real;

class RealValueObjectTest extends TestCase
{
    public function test_real_value_object_instantiates_correctly()
    {
        $real = new Real(115.16);

        $this->assertEquals(115.16, $real->value());
        $this->assertEquals(115, $real->toNatural()->value());
        $this->assertEquals(115, $real->toInteger()->value());

        $real = new Real(-115.16);

        $this->assertEquals(-115.16, $real->value());
        $this->assertEquals(-115, $real->toInteger()->value());
    }

    public function test_real_value_object_to_natural_on_negative_number_throws_exception()
    {
        $real = new Real(-115.16);

        $this->expectException(InvalidArgumentException::class);
        $real->toNatural()->value();
    }
}
