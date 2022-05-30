<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Warefy\Stores\Domain\StoreRepository;
use Warefy\Stores\Infrastructure\Persistence\EloquentStoreRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(StoreRepository::class, EloquentStoreRepository::class);
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
