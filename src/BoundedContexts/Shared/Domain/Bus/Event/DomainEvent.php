<?php

declare(strict_types=1);

namespace Warefy\Shared\Domain\Bus\Event;

use Shared\Domain\ValueObject\Generic\UUID;
use DateTimeImmutable;

abstract class DomainEvent
{
    private string $eventId;
    private string $occurredOn;

    public function __construct(private readonly string $aggregateId, ?string $eventId = null, ?string $occurredOn = null)
    {
        $this->eventId = $eventId ?? UUID::generate()->value();
        $this->occurredOn = $occurredOn ?? (new DateTimeImmutable())->format(\DateTimeInterface::ATOM);
    }

    abstract public static function fromPrimitives(
        string $aggregateId,
        array  $body,
        string $eventId,
        string $occurredOn
    ): self;

    abstract public static function eventName(): string;

    abstract public function toPrimitives(): array;

    public function aggregateId(): string
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): string
    {
        return $this->occurredOn;
    }
}
