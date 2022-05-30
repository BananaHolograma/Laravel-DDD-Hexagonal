<?php

declare(strict_types=1);

namespace Warefy\Stores\Application;

use Warefy\Stores\Domain\Repositories\StoreRepository;
use Warefy\Stores\Domain\Store;

class StoreCreator {

    public function __construct(private readonly StoreRepository $repository)
    {
    }

    public function __invoke(CreateStoreDTO $request): void
    {
        $store = new Store($request->id(), $request->name(), $request->url());

        $this->repository->save($store);
    }

}
