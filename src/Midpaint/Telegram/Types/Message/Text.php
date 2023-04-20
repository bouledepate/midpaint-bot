<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Message;

use Kernel\Components\ValueObject\OptionalValueObject;

final class Text extends OptionalValueObject
{
    public function __construct(string $value = null)
    {
        parent::__construct($value);
    }
}