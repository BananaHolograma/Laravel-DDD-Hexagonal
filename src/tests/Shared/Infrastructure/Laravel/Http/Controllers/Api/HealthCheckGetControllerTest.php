<?php

namespace Tests\Shared\Infrastructure\Laravel\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HealthCheckGetControllerTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_returns_an_http_ok_status(): void
    {
        $this->getJson(route('api.health-check'))->assertOk();
    }
}
