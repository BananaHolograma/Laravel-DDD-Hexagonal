<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject;


class StringValueObject
{
    public function __construct(protected string $value)
    {
    }

    /** Multi-byte character support
     * 
     * @return int
     */
    public function count(): int
    {
        return count(preg_split('//u', $this->value(), -1, PREG_SPLIT_NO_EMPTY));
    }

    public function equals(StringValueObject $other_value): bool
    {
        return $this->value() === $other_value->value();
    }

    public function value(): string
    {
        return $this->value;
    }
}
