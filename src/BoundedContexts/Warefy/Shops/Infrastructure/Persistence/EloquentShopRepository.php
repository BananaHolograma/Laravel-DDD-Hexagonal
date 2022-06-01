<?php
namespace Warefy\Shops\Infrastructure\Persistence;

use Warefy\Shops\Domain\Shop;
use App\Models\Shop as ShopEloquentModel;
use Warefy\Shops\Domain\ShopId;
use Warefy\Shops\Domain\ShopName;
use Warefy\Shops\Domain\ShopRepository;
use Warefy\Shops\Domain\ShopUrl;

class EloquentShopRepository implements ShopRepository
{
    public function search(string $id): ?Shop
    {
        $model = ShopEloquentModel::find($id);

        if(isset($model)) {
            return new Shop(new ShopId($model->getKey()), new ShopName($model->name),new ShopUrl($model->url));
        }

        return null;
    }

    public function save(Shop $shop): void
  {
      ShopEloquentModel::create(['id' => $shop->id()->value(), 'name' => $shop->name()->value(), 'url' => $shop->url()->value()]);
  }
}
