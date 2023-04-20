<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\Command;

use Kernel\Components\ValueObject\EnumValueObject;

enum AvailableCommand: string implements EnumValueObject
{
    case HELP = '/help';
    case START = '/start';
    case PROMPT = '/prompt';
    case UNDEFINED = 'undefined';

    public function value(): string
    {
        return $this->value;
    }
}