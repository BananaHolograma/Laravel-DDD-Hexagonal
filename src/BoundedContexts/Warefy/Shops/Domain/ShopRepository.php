<?php

namespace Warefy\Shops\Domain;

interface ShopRepository {
    public function search(string $id): ?Shop;
    public function save(Shop $shop) : void;
}
