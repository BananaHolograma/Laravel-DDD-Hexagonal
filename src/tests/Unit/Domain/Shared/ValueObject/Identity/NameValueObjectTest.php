<?php

namespace Tests\Unit\Domain\Shared\ValueObject\Identity;

use Tests\TestCase;
use Warefy\Domain\Shared\ValueObject\Identity\Name;

class NameValueObjectTest extends TestCase
{
    public function test_name_value_object_is_instantiated_correctly()
    {
        $name = Name::fromRaw("Peter", "Parker");

        $this->assertEquals($name->firstname()->value(), "Peter");
        $this->assertEquals($name->lastname()->value(), "Parker");
        $this->assertEquals($name->fullname()->value(), "Peter Parker");
    }
}
