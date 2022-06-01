<?php
namespace Warefy\Stores\Infrastructure\Persistence;

use Warefy\Stores\Domain\Shop;
use App\Models\Shop as ShopEloquentModel;
use Warefy\Stores\Domain\ShopId;
use Warefy\Stores\Domain\ShopRepository;

class EloquentShopRepository implements ShopRepository
{
    public function search(string $id): ?Shop
    {
        $model = ShopEloquentModel::find($id);

        if(isset($model)) {
            return new Shop(new ShopId($model->getKey()), $model->name, $model->url);
        }

        return null;
    }

    public function save(Shop $store): void
  {
      ShopEloquentModel::create(['id' => $store->id()->value(), 'name' => $store->name(), 'url' => $store->url()]);
  }
}
