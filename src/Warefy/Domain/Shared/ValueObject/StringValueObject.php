<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject;


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

    public function equalsTo(StringValueObject $other_value): bool
    {
        return $this->value() === $other_value->value();
    }


    public function notEqualsTo(StringValueObject $other_value): bool
    {
        return !$this->equalsTo($other_value);
    }

    /** Multi-byte character support
     * 
     * @return int
     */
    public function count(): int
    {
        return count(preg_split('//u', $this->value(), -1, PREG_SPLIT_NO_EMPTY));
    }
}
