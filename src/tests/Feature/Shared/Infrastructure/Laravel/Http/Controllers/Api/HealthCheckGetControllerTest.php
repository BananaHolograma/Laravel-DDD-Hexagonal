<?php

namespace Tests\Feature\Shared\Infrastructure\Laravel\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HealthCheckGetControllerTest extends TestCase
{
    /**
     * @test
     */
    public function health_check_endpoint_returns_an_http_ok_status(): void
    {
        $this->getJson(route('api.health-check'))->assertOk();
    }
}
