<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject\Generic;

use InvalidArgumentException;

class StringValueObject
{

    public function __construct(protected string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function sanitized(): string
    {
        return trim(strip_tags($this->value()));
    }

    public function equalsTo(StringValueObject $other): bool
    {
        return $this->sanitized() === $other->sanitized();
    }


    public function notEqualsTo(StringValueObject $other): bool
    {
        return !$this->equalsTo($other);
    }

    public function isEmpty(): bool
    {
        return empty($this->value());
    }

    /** Multi-byte character support
     * 
     * @return int
     */
    public function count(): int
    {
        return count(preg_split('//u', $this->value(), -1, PREG_SPLIT_NO_EMPTY));
    }

    public function toLowerCase(): string
    {
        return mb_strtolower($this->sanitized());
    }

    public function toUpperCase(): string
    {
        return mb_strtoupper($this->sanitized());
    }
}
