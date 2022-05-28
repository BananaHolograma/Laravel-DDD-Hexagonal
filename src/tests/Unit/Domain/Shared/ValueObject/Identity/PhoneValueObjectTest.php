<?php


namespace Tests\Unit\Domain\Shared\ValueObject\Identity;

use InvalidArgumentException;
use Tests\TestCase;
use Warefy\Domain\Shared\ValueObject\Identity\Phone;

class PhoneValueObjectTest extends TestCase
{
    public function test_phone_value_object_is_instantiated_correctly()
    {
        $phone = new Phone("+44 1213315000");
        $this->assertEquals("+44 1213315000", $phone->value());

        $phone = new Phone("+34 655444333");
        $this->assertEquals("+34 655444333", $phone->value());

        $phone = new Phone("+591 7433929333");
        $this->assertEquals("+591 7433929333", $phone->value());

        $phone = new Phone("+1 555 555 5554");
        $this->assertEquals("+1 555 555 5554", $phone->value());
    }

    public function test_phone_value_object_throw_exception_when_does_not_have_valid_format_1()
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone("+(591) 7433433");
    }

    public function test_phone_value_object_throw_exception_when_does_not_have_valid_format_2()
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone("+(591) (4) 6434850");
    }

    public function test_phone_value_object_throw_exception_when_does_not_have_valid_format_3()
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone("0591 74339296");
    }

    public function test_phone_value_object_throw_exception_when_does_not_have_valid_format_4()
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone("0001 5555555555");
    }

    public function test_phone_value_object_throw_exception_when_does_not_have_valid_format_5()
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone("59145678464222");
    }

    public function test_phone_value_object_throw_exception_when_does_not_have_valid_format_6()
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone("3333333333333");
    }
}
