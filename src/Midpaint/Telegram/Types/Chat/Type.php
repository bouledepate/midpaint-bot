<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Chat;

use Kernel\Components\ValueObject\EnumValueObject;

enum Type: string implements EnumValueObject
{
    case PRIVATE = 'private';
    case GROUP = 'group';
    case SUPERGROUP = 'supergroup';
    case CHANNEL = 'channel';

    public function value(): string
    {
        return $this->value;
    }
}