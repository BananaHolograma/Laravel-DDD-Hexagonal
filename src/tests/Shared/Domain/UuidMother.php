<?php

namespace Tests\Shared\Domain;

class UuidMother
{
    public static function create(): string
    {
        return MotherCreator::random()->unique()->uuid();
    }
}
