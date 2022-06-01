<?php

namespace Tests\Warefy\Shops\Application;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Warefy\Shops\Application\CreateShopDTO;
use Warefy\Shops\Application\ShopCreator;
use Warefy\Shops\Domain\Shop;
use Warefy\Shops\Domain\ShopId;
use Warefy\Shops\Domain\ShopRepository;

class ShopCreatorTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function it_should_creates_a_valid_store(): void
    {
        $this->expectNotToPerformAssertions();

        $id = $this->faker->uuid();
        $name = 'store-name';
        $url = 'store-url';

        $store = new Shop($id, $name, $url);

        $repository = $this->createMock(ShopRepository::class);
        $repository->method('save')->with($store);

        $creator = new ShopCreator($repository);
        $creator(new CreateShopDTO($id, $name, $url));
    }
}
