<?php

namespace Warefy\Stores\Domain;

class Store
{
    /**
     * @param StoreId $id
     * @param string $name
     * @param string $url
     */
    public function __construct(protected StoreId $id, protected string $name, protected string $url)
    {
    }

    public function id(): StoreId
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
