<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Shared\Infrastructure\Laravel\Http\Controllers\API\HealthCheckGetController;
use Warefy\Shops\Infrastructure\Laravel\Http\Controllers\API\CreateShopPutController;

Route::get('health-check', HealthCheckGetController::class)->name('api.health-check');

Route::put('shops/{id}', CreateShopPutController::class)->name('api.shops.create');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

