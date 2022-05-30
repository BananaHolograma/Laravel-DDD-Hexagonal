<?php

namespace Warefy\Stores\Domain\Repositories;

use Warefy\Stores\Domain\Store;

interface StoreRepository {
    public function search(string $id): ?Store;
    public function save(Store $store) : void;
}
