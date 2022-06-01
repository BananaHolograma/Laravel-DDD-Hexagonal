<?php

namespace Tests\Shared\Domain;

use Shared\Domain\ValueObject\Web\Url;

class UrlMother
{
    public static function create(): string {
        return MotherCreator::random()->unique()->url();
    }
}
