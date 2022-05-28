<?php


namespace Tests\Unit\Domain\Shared\ValueObject\Generic;

use Tests\TestCase;
use Warefy\Domain\Shared\ValueObject\Generic\StringValueObject;

class StringValueObjectTest extends TestCase
{
    public function test_string_value_object_instantiates()
    {
        $string = new StringValueObject("Iron man");

        $this->assertInstanceOf(StringValueObject::class, $string);
        $this->assertEquals('Iron man', $string->value());
    }

    public function test_string_value_object_count_includes_multibyte_characters()
    {
        // The strlen returns a value of 8 when in reality it's 5
        // More info in https://beamtic.com/count-characters-php
        $this->assertEquals(8, strlen('abcd💩'));
        $this->assertEquals(5, (new StringValueObject('abcd💩'))->count());
    }


    public function test_string_value_object_equality_methods()
    {
        $a = new StringValueObject("hulk");
        $b = new StringValueObject('wonder woman');

        $this->assertTrue($a->equalsTo(new StringValueObject($a->value())));
        $this->assertFalse($a->equalsTo($b));
        $this->assertTrue($a->notEqualsTo($b));
    }

    public function test_string_value_object_lower_and_upper()
    {
        $a = new StringValueObject("SpidErman");

        $this->assertEquals('SPIDERMAN', $a->toUpperCase());
        $this->assertEquals('spiderman', $a->toLowerCase());
    }
}
