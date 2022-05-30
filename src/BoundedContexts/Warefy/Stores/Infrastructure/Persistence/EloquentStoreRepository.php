<?php
namespace Warefy\Stores\Infrastructure\Persistence;

use Warefy\Stores\Domain\Store;
use App\Models\Store as StoreEloquentModel;
use Warefy\Stores\Domain\StoreId;
use Warefy\Stores\Domain\StoreRepository;

class EloquentStoreRepository implements StoreRepository
{
    public function search(string $id): ?Store
    {
        $model = StoreEloquentModel::find($id);

        if(isset($model)) {
            return new Store(new StoreId($model->getKey()), $model->name, $model->url);
        }

        return null;
    }

    public function save(Store $store): void
  {
      StoreEloquentModel::create(['id' => $store->id()->value(), 'name' => $store->name(), 'url' => $store->url()]);
  }
}
