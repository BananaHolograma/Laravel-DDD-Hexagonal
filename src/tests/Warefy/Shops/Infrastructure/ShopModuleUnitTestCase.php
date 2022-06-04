<?php

namespace Tests\Warefy\Shops\Infrastructure;

use Tests\TestCase;
use Warefy\Shops\Domain\Shop;
use Warefy\Shops\Domain\ShopRepository;

class ShopModuleUnitTestCase extends TestCase
{
    protected $repository; //Don't type this variable in order to allow use before initialization

    protected function shouldSave(Shop $shop): void {
        $this->repository()->method('save')->with($shop);
    }

    protected function repository(): \PHPUnit\Framework\MockObject\MockObject|ShopRepository
    {
        return $this->repository = $this->repository ?: $this->createMock(ShopRepository::class);
    }
}
