<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Chat;

use Kernel\Components\ValueObject\OptionalValueObject;

final class LastName extends OptionalValueObject
{
    public function __construct(?string $value = null)
    {
        parent::__construct($value);
    }
}