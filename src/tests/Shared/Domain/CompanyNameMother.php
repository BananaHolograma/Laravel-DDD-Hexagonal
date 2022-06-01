<?php

namespace Tests\Shared\Domain;

class CompanyNameMother
{
    public static function create(): string {
        return MotherCreator::random()->unique()->company();
    }
}
