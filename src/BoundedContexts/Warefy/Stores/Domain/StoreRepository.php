<?php

namespace Warefy\Stores\Domain;

interface StoreRepository {
    public function search(string $id): ?Store;
    public function save(Store $store) : void;
}
