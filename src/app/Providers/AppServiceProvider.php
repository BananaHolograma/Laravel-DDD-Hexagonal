<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Warefy\Stores\Domain\ShopRepository;
use Warefy\Stores\Infrastructure\Persistence\EloquentShopRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ShopRepository::class, EloquentShopRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
