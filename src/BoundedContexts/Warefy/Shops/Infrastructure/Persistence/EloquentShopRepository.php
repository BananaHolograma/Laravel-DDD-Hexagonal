<?php
namespace Warefy\Shops\Infrastructure\Persistence;

use Warefy\Shops\Domain\Shop;
use App\Models\Shop as ShopEloquentModel;
use Warefy\Shops\Domain\ShopId;
use Warefy\Shops\Domain\ShopRepository;

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
