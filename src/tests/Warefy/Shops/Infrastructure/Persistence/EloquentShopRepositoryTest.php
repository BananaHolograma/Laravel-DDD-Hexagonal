<?php

namespace Tests\Warefy\Shops\Infrastructure\Persistence;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Warefy\Shops\Domain\ShopMother;
use Warefy\Shops\Domain\Shop;
use Warefy\Shops\Domain\ShopId;
use Warefy\Shops\Infrastructure\Persistence\EloquentShopRepository;

class EloquentShopRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_should_save_a_valid_store(): void
    {
        $repository = new EloquentShopRepository();
        $shop = ShopMother::create();

        $repository->save($shop);

        $this->assertDatabaseHas('shops', ['id' => $shop->id()->value()]);
        $this->assertEquals($shop, $repository->search($shop->id()->value()));
    }

    /** @test */
    public function it_should_return_null_when_store_not_exists(): void
    {
        $repository = new EloquentShopRepository();

        $this->assertNull($repository->search("fake id"));
    }
}
