<?php

namespace Tests\Warefy\Shops\Application;

use Tests\TestCase;
use Tests\Warefy\Shops\Domain\ShopMother;
use Warefy\Shops\Application\ShopCreator;
use Warefy\Shops\Domain\ShopRepository;

class ShopCreatorTest extends TestCase
{
    /** @test */
    public function it_should_creates_a_valid_store(): void
    {
        $this->expectNotToPerformAssertions();

        $shop = ShopMother::create();

        $repository = $this->createMock(ShopRepository::class);
        $repository->method('save')->with($shop);

        $creator = new ShopCreator($repository);
        $creator(CreateShopDTOMother::create($shop->id(), $shop->name(), $shop->url()));
    }
}
