<?php

namespace Warefy\Shops\Domain\Events;

use Warefy\Shared\Domain\Bus\Event\DomainEvent;

class ShopCreatedDomainEvent extends DomainEvent
{
    public function __construct(
        private string  $id,
        private string  $name,
        private string  $url,
        private ?string $eventId = null,
        private ?string $occurredOn = null
    )
    {
        parent::__construct($id, $eventId, $occurredOn);
    }


    public static function eventName(): string
    {
        return 'shop.created';
    }


    public static function fromPrimitives(
        string $aggregateId,
        array  $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent
    {
        return new self($aggregateId, $body['name'], $body['url'], $eventId, $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name(),
            'url' => $this->url()
        ];
    }

    public function name(): string
    {
        return $this->name;
    }


    public function url(): string
    {
        return $this->url;
    }
}
