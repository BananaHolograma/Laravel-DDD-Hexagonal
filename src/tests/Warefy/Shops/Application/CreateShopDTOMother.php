<?php

namespace Tests\Warefy\Shops\Application;


use Tests\Warefy\Shops\Domain\ShopIdMother;
use Tests\Warefy\Shops\Domain\ShopNameMother;
use Tests\Warefy\Shops\Domain\ShopUrlMother;
use Warefy\Shops\Application\CreateShopDTO;
use Warefy\Shops\Domain\ShopId;
use Warefy\Shops\Domain\ShopName;
use Warefy\Shops\Domain\ShopUrl;

class CreateShopDTOMother
{
    public static function create(?ShopId $id = null, ?ShopName $name = null, ?ShopUrl $url = null): CreateShopDTO
    {
        return new CreateShopDTO(
            $id?->value() ?? ShopIdMother::create()->value(),
            $name?->value() ?? ShopNameMother::create()->value(),
            $url?->value() ?? ShopUrlMother::create()->value()
        );
    }
}
