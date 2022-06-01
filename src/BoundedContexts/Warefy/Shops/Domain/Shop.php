<?php

namespace Warefy\Shops\Domain;

class Shop
{
    /**
     * @param ShopId $id
     * @param ShopTitle $name
     * @param ShopUrl $url
     */
    public function __construct(protected ShopId $id, protected ShopTitle $name, protected ShopUrl $url)
    {
    }

    public function id(): ShopId
    {
        return $this->id;
    }

    public function name(): ShopTitle
    {
        return $this->name;
    }

    public function url(): ShopUrl
    {
        return $this->url;
    }
}
