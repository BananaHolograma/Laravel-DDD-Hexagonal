<?php

namespace Tests\Unit\Warefy\Shared\Domain\ValueObject\Number;

use InvalidArgumentException;
use Tests\TestCase;
use Warefy\Shared\Domain\ValueObject\Number\Natural;

class NaturalValueObjectTest extends TestCase
{
    public function test_natural_value_object_instantiates_correctly(): void
    {
        $natural = new Natural(7);

        $this->assertEquals(7, $natural->value());
    }

    public function test_natural_value_object_throws_exception_when_is_not_natural_number(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Natural(-7);
    }
}
