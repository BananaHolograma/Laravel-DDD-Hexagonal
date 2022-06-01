<?php

namespace Warefy\Shops\Infrastructure\Laravel\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Warefy\Shops\Application\CreateShopDTO;
use Warefy\Shops\Application\ShopCreator;
use Warefy\Shops\Infrastructure\Laravel\Http\Requests\CreateShopFormRequest;

class CreateShopPutController extends Controller
{
    public function __construct(private readonly ShopCreator $creator)
    {
    }

    public function __invoke(CreateShopFormRequest $request, string $id): JsonResponse
    {
        ($this->creator)(CreateShopDTO::fromRequest($id, $request));

        return response()->json([], Response::HTTP_CREATED);
    }
}
