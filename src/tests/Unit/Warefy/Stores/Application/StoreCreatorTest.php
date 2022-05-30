<?php

namespace Tests\Unit\Warefy\Stores\Application;

use Mockery\MockInterface;
use Tests\TestCase;
use Warefy\Stores\Application\StoreCreator;
use Warefy\Stores\Domain\Repositories\StoreRepository;
use Warefy\Stores\Domain\Store;

class StoreCreatorTest extends TestCase {

    /** @test */
    public function it_should_creates_a_valid_store(): void {
        $this->expectNotToPerformAssertions();

        $id = 'some-id';
        $name = 'store-name';
        $url = 'store-url';

        $store = new Store($id, $name, $url);

        $repository = $this->createMock(StoreRepository::class);
        $repository->method('save')->with($store);

        $creator = new StoreCreator($repository);
        $creator($id, $name, $url);
    }
}
