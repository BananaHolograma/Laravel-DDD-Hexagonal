<?php

namespace Shared\Infrastructure\Laravel\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HealthCheckGetController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(['status' => 'OK'], Response::HTTP_OK);
    }
}
