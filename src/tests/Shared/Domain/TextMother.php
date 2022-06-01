<?php

namespace Tests\Shared\Domain;

class TextMother
{
    public static function create(): string
    {
        return MotherCreator::random()->text();
    }

    public static function realText(int $min_characters = 160, int $max_characters = 255): string
    {
        return MotherCreator::random()->realTextBetween($min_characters, $max_characters);
    }

}
