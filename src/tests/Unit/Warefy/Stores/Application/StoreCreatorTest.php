<?php

namespace Tests\Unit\Warefy\Stores\Application;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Warefy\Stores\Application\CreateShopDTO;
use Warefy\Stores\Application\ShopCreator;
use Warefy\Stores\Domain\Shop;
use Warefy\Stores\Domain\ShopId;
use Warefy\Stores\Domain\ShopRepository;

class StoreCreatorTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function it_should_creates_a_valid_store(): void
    {
        $this->expectNotToPerformAssertions();

        $id = new ShopId($this->faker->uuid());
        $name = 'store-name';
        $url = 'store-url';

        $store = new Shop($id, $name, $url);

        $repository = $this->createMock(ShopRepository::class);
        $repository->method('save')->with($store);

        $creator = new ShopCreator($repository);
        $creator(new CreateShopDTO($id, $name, $url));
    }
}
