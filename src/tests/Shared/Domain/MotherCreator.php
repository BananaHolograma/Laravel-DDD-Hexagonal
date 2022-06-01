<?php

namespace Tests\Shared\Domain;

class MotherCreator
{
    use \Illuminate\Foundation\Testing\WithFaker;

    public function __construct()
    {
        $this->setUpFaker();
    }

    public static function random(): \Faker\Generator
    {
        return (new self())->faker();
    }
}
