<?php

namespace Tests\Warefy\Shops\Infrastructure\Laravel\Http\Controllers\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Shared\Domain\UuidMother;
use Tests\TestCase;
use Tests\Warefy\Shops\Domain\ShopNameMother;
use Tests\Warefy\Shops\Domain\ShopUrlMother;

class CreateShopPutControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_return_http_status_created(): void
    {
        $this->putJson(route('api.shops.create', ['id' => UuidMother::create()]),
            ['name' => ShopNameMother::create()->value(), 'url' => ShopUrlMother::create()->value()])
            ->assertCreated();
    }
}
