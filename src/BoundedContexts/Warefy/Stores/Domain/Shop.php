<?php

namespace Warefy\Stores\Domain;

class Shop
{
    /**
     * @param ShopId $id
     * @param string $name
     * @param string $url
     */
    public function __construct(protected ShopId $id, protected string $name, protected string $url)
    {
    }

    public function id(): ShopId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function url(): string
    {
        return $this->url;
    }
}
