<?php

namespace Tests\Unit\Shared\Domain\ValueObject\Web;

use InvalidArgumentException;
use Tests\TestCase;
use Shared\Domain\ValueObject\Web\Url;

class UrlValueObjectTest extends TestCase
{

      /** @test */
    public function it_should_instantiates_a_valid_url_value(): void
    {
        $url = new Url("https://app.local/");

        $this->assertEquals("https://app.local/", $url->value());

        $url = new Url("http://app.local/");
        $this->assertEquals("http://app.local/", $url->value());

        $url = new Url("https://example.org/api/health-check");
        $this->assertEquals("https://example.org/api/health-check", $url->value());
    }

     /** @test */
    public function it_should_should_throws_invalid_argument_exception_when_url_is_not_valid(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Url("invalid url");
    }
}

