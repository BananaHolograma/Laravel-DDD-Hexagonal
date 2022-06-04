<?php

namespace Tests\Warefy\Shops\Domain;

use Tests\Shared\Domain\UuidMother;
use Warefy\Shops\Domain\ShopId;

class ShopIdMother
{
    public static function create(?string $shop_id = null): ShopId
    {
        return new ShopId($shop_id ?? UuidMother::create());
    }
}
