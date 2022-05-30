<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Shared\Infrastructure\Laravel\Http\Controllers\API\HealthCheckGetController;
use Warefy\Stores\Infrastructure\Laravel\Http\Controllers\API\CreateStorePutController;

Route::get('health-check', HealthCheckGetController::class)->name('api.health-check');

Route::put('stores/{id}', CreateStorePutController::class)->name('api.stores.create');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

