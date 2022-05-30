<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObject\Web;

use Shared\Domain\ValueObject\Generic\StringValueObject;

class Url extends StringValueObject {
    public function __construct(protected string $value)
    {
      if(!filter_var($value, FILTER_VALIDATE_URL)) {
          throw new \InvalidArgumentException("The value $value is not a valid URL.");
      }
        parent::__construct($value);
    }
}
