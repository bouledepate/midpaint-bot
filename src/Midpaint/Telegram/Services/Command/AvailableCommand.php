<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\Command;

use Kernel\Components\ValueObject\EnumValueObject;

enum AvailableCommand: string implements EnumValueObject
{
    case TEST = '/test';
    case UNDEFINED = 'undefined';

    public function value(): string
    {
        return $this->value;
    }
}