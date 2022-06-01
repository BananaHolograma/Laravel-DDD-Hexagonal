<?php

namespace Tests\Warefy\Shops\Domain;

use Tests\Shared\Domain\UrlMother;
use Warefy\Shops\Domain\ShopUrl;

class ShopUrlMother
{
    public static function create(): ShopUrl
    {
        return new ShopUrl(UrlMother::create());
    }
}
