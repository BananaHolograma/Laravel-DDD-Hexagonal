<?php

namespace Warefy\Stores\Infrastructure\Laravel\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateStorePutController extends Controller
{
    public function __invoke(Request $request, string $id): JsonResponse
    {
        return response()->json([], 201);
    }
}
