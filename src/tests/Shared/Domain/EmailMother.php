<?php

namespace Tests\Shared\Domain;

use Shared\Domain\ValueObject\Identity\Email;

class EmailMother
{
    public static function create(): Email {
        return new Email(MotherCreator::random()->unique()->email());
    }
}
