<?php

namespace Tests\Warefy\Shops\Domain;

use Tests\Shared\Domain\UuidMother;
use Warefy\Shops\Domain\ShopId;

class ShopIdMother
{
    public static function create(): ShopId
    {
        return new ShopId(UuidMother::create());
    }
}
