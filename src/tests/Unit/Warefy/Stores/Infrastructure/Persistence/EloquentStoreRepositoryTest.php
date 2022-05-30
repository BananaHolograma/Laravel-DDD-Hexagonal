<?php

namespace Tests\Unit\Warefy\Stores\Infrastructure\Persistence;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Warefy\Stores\Domain\Store;
use Warefy\Stores\Infrastructure\Persistence\EloquentStoreRepository;

class EloquentStoreRepositoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_should_save_a_valid_store(): void {
        $repository = new EloquentStoreRepository();

        $id = $this->faker->uuid();
        $name = $this->faker->company();
        $url =  $this->faker->url();

        $store = new Store($id, $name, $url);

        $repository->save($store);

        $this->assertDatabaseHas('stores', ['id' => $id ]);
        $this->assertEquals($store, $repository->search($id));
    }

    /** @test */
    public function it_should_return_null_when_store_not_exists(): void
    {
        $repository = new EloquentStoreRepository();

        $this->assertNull($repository->search("fake id"));
    }
}
