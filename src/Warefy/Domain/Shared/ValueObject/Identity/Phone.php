<?php

declare(strict_types=1);

namespace Warefy\Domain\Shared\ValueObject\Identity;

use InvalidArgumentException;
use Warefy\Domain\Shared\ValueObject\Generic\StringValueObject;

class Phone extends StringValueObject
{
    public function __construct(protected string $value)
    {
        if (!preg_match("/^\+\d{1,3}\s\d{2,3}\s\d{2,3}\s\d{4}|^\+\d{1,3}\s\d{1,14}(\s\d{1,13})?|^\(\d{3}\)\s\d{3}\s\d{4}?/", $value)) {
            throw new InvalidArgumentException("This phone {$value} does not have a valid E.123 or E.164 format");
        }
    }
}
