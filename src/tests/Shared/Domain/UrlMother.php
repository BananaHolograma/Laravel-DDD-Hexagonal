<?php

namespace Tests\Shared\Domain;

use Shared\Domain\ValueObject\Web\Url;

class UrlMother
{
    public static function create(): Url {
        return new Url(MotherCreator::random()->unique()->url());
    }
}
