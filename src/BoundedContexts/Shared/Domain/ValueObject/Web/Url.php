<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject\Web;

use InvalidArgumentException;
use Shared\Domain\ValueObject\Generic\StringValueObject;

class Url extends StringValueObject
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValidURL($value);

        parent::__construct($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    /** @throws InvalidArgumentException */
    private function ensureIsValidURL(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException("The value $value is not a valid URL.");
        }
    }
}
