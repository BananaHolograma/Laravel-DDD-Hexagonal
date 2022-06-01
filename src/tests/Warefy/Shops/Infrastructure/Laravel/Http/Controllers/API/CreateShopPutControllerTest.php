<?php

namespace Tests\Warefy\Shops\Infrastructure\Laravel\Http\Controllers\API;

use Shared\Domain\ValueObject\Generic\UUID;
use Tests\TestCase;

class CreateShopPutControllerTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_return_http_status_created(): void
    {
        $this->putJson(route('api.shops.create', ['id' => UUID::generate()->value()]),
        ['name' => 'Book shop', 'url' => 'https://bookshop.com'])
            ->assertCreated();
    }
}
