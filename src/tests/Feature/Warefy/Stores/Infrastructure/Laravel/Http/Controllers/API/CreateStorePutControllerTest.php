<?php

namespace Tests\Feature\Warefy\Stores\Infrastructure\Laravel\Http\Controllers\API;

use Shared\Domain\ValueObject\Generic\UUID;
use Tests\TestCase;

class CreateStorePutControllerTest extends TestCase
{
    /**
     * @test
     */
    public function create_store_endpoint_should_return_http_status_created(): void
    {
        $this->putJson(route('api.stores.create', ['id' => UUID::generate()->value()]))->assertCreated();
    }
}
