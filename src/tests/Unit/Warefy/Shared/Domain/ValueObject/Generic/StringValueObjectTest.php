<?php


namespace Tests\Unit\Warefy\Shared\Domain\ValueObject\Generic;

use Tests\TestCase;
use Shared\Domain\ValueObject\Generic\StringValueObject;

class StringValueObjectTest extends TestCase
{
    public function test_string_value_object_instantiates(): void
    {
        $string = new StringValueObject("Iron man");

        $this->assertInstanceOf(StringValueObject::class, $string);
        $this->assertEquals('Iron man', $string->value());
    }

    public function test_string_value_object_count_includes_multibyte_characters(): void
    {
        // The strlen returns a value of 8 when in reality it's 5
        // More info in https://beamtic.com/count-characters-php
        $this->assertEquals(8, strlen('abcd💩'));
        $this->assertEquals(5, (new StringValueObject('abcd💩'))->count());
    }


    public function test_string_value_object_equality_methods(): void
    {
        $a = new StringValueObject("hulk");
        $b = new StringValueObject('wonder woman');

        $this->assertTrue($a->equalsTo(new StringValueObject($a->value())));
        $this->assertFalse($a->equalsTo($b));
        $this->assertTrue($a->notEqualsTo($b));
    }

    public function test_string_value_object_lower_and_upper(): void
    {
        $a = new StringValueObject("SpidErman");

        $this->assertEquals('SPIDERMAN', $a->toUpperCase());
        $this->assertEquals('spiderman', $a->toLowerCase());
    }
}
