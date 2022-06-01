<?php

namespace Tests\Shared\Domain;

class MotherCreator
{
    use \Illuminate\Foundation\Testing\WithFaker;

    public static function random(): \Faker\Generator {
        return (new self())->faker;
    }
}
