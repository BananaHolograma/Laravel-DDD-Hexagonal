<?php

namespace Warefy\Shops\Application;

use Warefy\Shops\Domain\ShopId;
use Warefy\Shops\Domain\ShopTitle;
use Warefy\Shops\Domain\ShopUrl;
use Warefy\Shops\Infrastructure\Laravel\Http\Requests\CreateShopFormRequest;

class CreateShopDTO
{
    public function __construct(
        private readonly string $id,
        private readonly string $name,
        private readonly string $url
    )
    {
    }

    public static function fromRequest(string $id, CreateShopFormRequest $request): self
    {
        $validated = $request->validated();

        return new self($id, $validated['name'], $validated['url']);
    }

    public function id(): string
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
