<?php

namespace Warefy\Stores\Application;

use Warefy\Stores\Domain\StoreId;
use Warefy\Stores\Infrastructure\Laravel\Http\Requests\CreateStoreFormRequest;

class CreateStoreDTO
{
    public function __construct(
        private readonly StoreId $id,
        private readonly string $name,
        private readonly string $url
    )
    {

    }

    public static function fromRequest(string $id, CreateStoreFormRequest $request): self
    {
        $validated = $request->validated();

        return new self(new StoreId($id), $validated['name'], $validated['url']);
    }

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
