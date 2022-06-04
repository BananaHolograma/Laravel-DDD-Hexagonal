<?php

namespace Tests\Warefy\Shops\Domain;

use Tests\Shared\Domain\UrlMother;
use Warefy\Shops\Domain\ShopUrl;

class ShopUrlMother
{
    public static function create(?string $shop_url = null): ShopUrl
    {
        return new ShopUrl($shop_url ?? UrlMother::create());
    }
}
