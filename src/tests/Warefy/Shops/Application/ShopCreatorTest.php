<?php

namespace Tests\Warefy\Shops\Application;

use Tests\Warefy\Shops\Domain\ShopMother;
use Tests\Warefy\Shops\Infrastructure\ShopModuleUnitTestCase;
use Warefy\Shops\Application\ShopCreator;


class ShopCreatorTest extends ShopModuleUnitTestCase
{
    private ShopCreator $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new ShopCreator($this->repository());
    }

    /** @test */
    public function it_should_creates_a_valid_store(): void
    {
        $this->expectNotToPerformAssertions();

        $dto = CreateShopDTOMother::create();
        $shop = ShopMother::fromDTO($dto);

        $this->shouldSave($shop);

        ($this->creator)($dto);
    }

}
