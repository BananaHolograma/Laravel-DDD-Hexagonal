<?php

namespace Tests\Warefy\Shops\Domain;

use Warefy\Shops\Application\CreateShopDTO;
use Warefy\Shops\Domain\Shop;
use Warefy\Shops\Domain\ShopId;
use Warefy\Shops\Domain\ShopName;
use Warefy\Shops\Domain\ShopUrl;

class ShopMother
{
    public static function create(?ShopId $id = null, ?ShopName $name = null, ?ShopUrl $url = null): Shop
    {
        return new Shop(
            $id ?? ShopIdMother::create(),
            $name ?? ShopNameMother::create(),
            $url ?? ShopUrlMother::create()
        );
    }

    public static function fromDTO(CreateShopDTO $dto): Shop
    {
        return self::create(
            ShopIdMother::create($dto->id()),
            ShopNameMother::create($dto->name()),
            ShopUrlMother::create($dto->url()),
        );
    }
}
