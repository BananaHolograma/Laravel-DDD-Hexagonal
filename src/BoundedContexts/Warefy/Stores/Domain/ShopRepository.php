<?php

namespace Warefy\Stores\Domain;

interface ShopRepository {
    public function search(string $id): ?Shop;
    public function save(Shop $store) : void;
}
