<?php

namespace Warefy\Stores\Domain;

class Store
{
    /**
     * @param string $id
     * @param string $name
     * @param string $url
     */
    public function __construct(protected string $id, protected string $name, protected string $url)
    {
    }

    /**
     * @return string
     */
    public function id(): string
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
