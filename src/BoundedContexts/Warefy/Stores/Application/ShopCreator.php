<?php

declare(strict_types=1);

namespace Warefy\Stores\Application;

use Warefy\Stores\Domain\Shop;
use Warefy\Stores\Domain\ShopRepository;

class ShopCreator {

    public function __construct(private readonly ShopRepository $repository)
    {
    }

    public function __invoke(CreateShopDTO $request): void
    {
        $store = new Shop($request->id(), $request->name(), $request->url());

        $this->repository->save($store);
    }

}
