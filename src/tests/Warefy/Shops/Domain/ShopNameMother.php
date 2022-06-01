<?php

namespace Tests\Warefy\Shops\Domain;

use Tests\Shared\Domain\CompanyNameMother;
use Warefy\Shops\Domain\ShopName;

class ShopNameMother
{
    public static function create(): ShopName {
        return new ShopName(CompanyNameMother::create());
    }
}
