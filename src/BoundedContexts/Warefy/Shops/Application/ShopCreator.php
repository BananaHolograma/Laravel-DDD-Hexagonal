<?php

declare(strict_types=1);

namespace Warefy\Shops\Application;

use Warefy\Shops\Domain\Shop;
use Warefy\Shops\Domain\ShopId;
use Warefy\Shops\Domain\ShopRepository;
use Warefy\Shops\Domain\ShopName;
use Warefy\Shops\Domain\ShopUrl;

class ShopCreator {

    public function __construct(private readonly ShopRepository $repository)
    {
    }

    public function __invoke(CreateShopDTO $request): void
    {
        $store = new Shop(new ShopId($request->id()), new ShopName($request->name()), new ShopUrl($request->url()));

        $this->repository->save($store);
    }

}
