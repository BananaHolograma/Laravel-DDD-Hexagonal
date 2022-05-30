<?php

namespace Warefy\Stores\Domain;

use Warefy\Stores\Domain\ValueObject\StoreId;

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

    /**
     * @return string
     */
    public function id(): StoreId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    public function url(): string
    {
        return $this->url;
    }
}
