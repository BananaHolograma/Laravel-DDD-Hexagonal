<?php

namespace Tests\Unit\Domain\Shared\ValueObject\Number;

use InvalidArgumentException;
use Tests\TestCase;
use Warefy\Domain\Shared\ValueObject\Number\Natural;

class NaturalValueObjectTest extends TestCase
{
    public function test_natural_value_object_instantiates_correctly()
    {
        $natural = new Natural(7);

        $this->assertEquals(7, $natural->value());
    }

    public function test_natural_value_object_throws_exception_when_is_not_natural_number()
    {
        $this->expectException(InvalidArgumentException::class);
        new Natural(-7);
    }
}
