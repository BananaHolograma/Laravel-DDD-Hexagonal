<?php

namespace Tests\Unit\Warefy\Stores\Infrastructure\Persistence;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Warefy\Stores\Domain\Shop;
use Warefy\Stores\Domain\ShopId;
use Warefy\Stores\Infrastructure\Persistence\EloquentShopRepository;

class EloquentStoreRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_should_save_a_valid_store(): void {
        $repository = new EloquentShopRepository();

        $id = ShopId::generate();
        $name = $this->faker->company();
        $url =  $this->faker->url();

        $store = new Shop($id, $name, $url);

        $repository->save($store);

        $this->assertDatabaseHas('stores', ['id' => $id->value() ]);
        $this->assertEquals($store, $repository->search($id->value()));
    }

    /** @test */
    public function it_should_return_null_when_store_not_exists(): void
    {
        $repository = new EloquentShopRepository();

        $this->assertNull($repository->search("fake id"));
    }
}
