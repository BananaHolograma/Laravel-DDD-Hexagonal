<?php


namespace Tests\Unit\Warefy\Shared\Domain\ValueObject\Identity;

use InvalidArgumentException;
use Tests\TestCase;
use Shared\Domain\ValueObject\Identity\Email;

class EmailValueObjectTest extends TestCase
{
    public function test_email_value_object_is_instantiated_correctly(): void
    {
        $email = new Email("test@example.org");

        $this->assertEquals("test@example.org", $email->value());
        $this->assertEquals("example.org", $email->domain()->value());
        $this->assertEquals("test", $email->local()->value());
    }

    public function test_email_value_object_throws_invalid_argument_exception_when_not_valid_email(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Email("not an email");
    }
}
