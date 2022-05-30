<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject\Generic;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class UUID extends StringValueObject
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValidUuid($value);

        parent::__construct($value);
    }

    public static function generate(): self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    private function ensureIsValidUUID(string $id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }
}
