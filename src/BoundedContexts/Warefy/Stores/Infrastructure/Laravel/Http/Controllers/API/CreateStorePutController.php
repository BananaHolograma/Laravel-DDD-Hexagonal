<?php

namespace Warefy\Stores\Infrastructure\Laravel\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Warefy\Stores\Application\StoreCreator;
use Warefy\Stores\Infrastructure\Laravel\Http\Requests\CreateStoreFormRequest;

class CreateStorePutController extends Controller
{
    public function __construct(private readonly StoreCreator $creator)
    {
    }

    public function __invoke(CreateStoreFormRequest $request, string $id): JsonResponse
    {
        $validated = $request->validated();

        ($this->creator)($id, $validated['name'], $validated['url']);

        return response()->json([], Response::HTTP_CREATED);
    }
}
