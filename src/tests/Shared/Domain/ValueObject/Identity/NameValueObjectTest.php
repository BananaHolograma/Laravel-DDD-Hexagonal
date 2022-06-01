<?php

namespace Tests\Shared\Domain\ValueObject\Identity;

use Tests\TestCase;
use Shared\Domain\ValueObject\Identity\Name;

class NameValueObjectTest extends TestCase
{
    public function test_name_value_object_is_instantiated_correctly(): void
    {
        $name = Name::fromRaw("Peter", "Parker");

        $this->assertEquals( "Peter", $name->firstname()->value());
        $this->assertEquals("Parker",$name->lastname()->value());
        $this->assertEquals("Peter Parker", $name->fullname()->value() );
    }
}
