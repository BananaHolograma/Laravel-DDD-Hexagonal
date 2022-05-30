<?php

namespace Tests\Unit\Warefy\Stores\Application;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Warefy\Stores\Application\CreateStoreDTO;
use Warefy\Stores\Application\StoreCreator;
use Warefy\Stores\Domain\Store;
use Warefy\Stores\Domain\StoreId;
use Warefy\Stores\Domain\StoreRepository;

class StoreCreatorTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function it_should_creates_a_valid_store(): void
    {
        $this->expectNotToPerformAssertions();

        $id = new StoreId($this->faker->uuid());
        $name = 'store-name';
        $url = 'store-url';

        $store = new Store($id, $name, $url);

        $repository = $this->createMock(StoreRepository::class);
        $repository->method('save')->with($store);

        $creator = new StoreCreator($repository);
        $creator(new CreateStoreDTO($id, $name, $url));
    }
}
