<?php

namespace Tests\Warefy\Shops\Domain;

use Tests\Shared\Domain\CompanyNameMother;
use Warefy\Shops\Domain\ShopName;

class ShopNameMother
{
    public static function create(?string $shop_name = null): ShopName {
        return new ShopName($shop_name ?? CompanyNameMother::create());
    }
}
