<?php

namespace Warefy\Shops\Domain;

class Shop
{
    /**
     * @param ShopId $id
     * @param ShopName $name
     * @param ShopUrl $url
     */
    public function __construct(protected ShopId $id, protected ShopName $name, protected ShopUrl $url)
    {
    }

    public function id(): ShopId
    {
        return $this->id;
    }

    public function name(): ShopName
    {
        return $this->name;
    }

    public function url(): ShopUrl
    {
        return $this->url;
    }
}
