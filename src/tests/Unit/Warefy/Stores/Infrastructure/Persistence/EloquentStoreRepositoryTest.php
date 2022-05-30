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

        $repository->save(new Store($id, $name, $url));

        $this->assertDatabaseHas('stores', ['id' => $id ]);

        $store_saved = $repository->search($id);

        $this->assertEquals($id, $store_saved->id());
        $this->assertEquals($name, $store_saved->name());
        $this->assertEquals($url, $store_saved->url());

    }
}
