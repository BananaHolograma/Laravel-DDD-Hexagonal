<?php

declare(strict_types=1);

namespace Warefy\Shared\Domain\ValueObject\Identity;

use InvalidArgumentException;
use Warefy\Shared\Domain\ValueObject\Generic\StringValueObject;

class Email extends StringValueObject
{
    public function __construct(protected string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("The email $value is bad formatted.");
        }

        parent::__construct($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function local(): StringValueObject
    {
        $parts = explode('@', $this->value());

        return new StringValueObject($parts[0]);
    }

    public function domain(): StringValueObject
    {
        $parts = explode('@', $this->value());
        $domain = trim($parts[1], '[]');

        return new StringValueObject($domain);
    }
}
