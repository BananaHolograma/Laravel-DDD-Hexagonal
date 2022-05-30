<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject\Identity;

use Shared\Domain\ValueObject\Generic\StringValueObject;

class Name
{
    public function __construct(protected StringValueObject $firstname, protected StringValueObject $lastname)
    {
    }

    public static function fromRaw(string $firstname, ?string $lastname = ''): self
    {
        return new self(new StringValueObject($firstname), new StringValueObject($lastname));
    }


    public function firstname(): StringValueObject
    {
        return $this->firstname;
    }

    public function lastname(): StringValueObject
    {
        return $this->lastname;
    }

    public function fullname(): StringValueObject
    {
        return new StringValueObject("{$this->firstname()->value()} {$this->lastname()->value()}");
    }
}
