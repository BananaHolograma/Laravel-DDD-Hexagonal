<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Shared\Infrastructure\Laravel\Http\Controllers\API\HealthCheckGetController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('health-check', HealthCheckGetController::class)->name('api.health-check');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
