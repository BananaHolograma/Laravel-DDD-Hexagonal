<?php

namespace Warefy\Stores\Application;

use Warefy\Stores\Domain\ShopId;
use Warefy\Stores\Infrastructure\Laravel\Http\Requests\CreateShopFormRequest;

class CreateShopDTO
{
    public function __construct(
        private readonly ShopId $id,
        private readonly string $name,
        private readonly string $url
    )
    {
    }

    public static function fromRequest(string $id, CreateShopFormRequest $request): self
    {
        $validated = $request->validated();

        return new self(new ShopId($id), $validated['name'], $validated['url']);
    }

    public function id(): ShopId
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
