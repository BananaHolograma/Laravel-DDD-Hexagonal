<?php


namespace Tests\Unit\Domain\Shared\ValueObject\Identity;

use InvalidArgumentException;
use Tests\TestCase;
use Warefy\Domain\Shared\ValueObject\Identity\Email;

class EmailValueObjectTest extends TestCase
{
    public function test_email_value_object_is_instantiated_correctly()
    {
        $email = new Email("test@example.org");

        $this->assertEquals($email->value(), "test@example.org");
        $this->assertEquals("example.org", $email->domain()->value());
        $this->assertEquals("test", $email->local()->value());
    }

    public function test_email_value_object_throws_invalid_argument_exception_when_not_valid_email()
    {
        $this->expectException(InvalidArgumentException::class);
        new Email("not an email");
    }
}
