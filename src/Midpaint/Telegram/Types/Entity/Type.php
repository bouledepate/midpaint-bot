<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Entity;

use Kernel\Components\ValueObject\EnumValueObject;

enum Type: string implements EnumValueObject
{
    case MENTION = 'mention';
    case TEXT_MENTION = 'text_mention';
    case HASHTAG = 'hashtag';
    case CASHTAG = 'cashtag';
    case COMMAND = 'bot_command';
    case PHONE = 'phone_number';
    case LINK = 'url';
    case TEXT_LINK = 'text_link';
    case EMAIL = 'email';
    case BOLD = 'bold';
    case ITALIC = 'italic';
    case UNDERLINE = 'underline';
    case STRIKETHROUGH = 'strikethrough';
    case SPOILER = 'spoiler';
    case CODE = 'code';
    case PRE = 'pre';
    case EMOJI = 'custom_emoji';

    public function value(): string
    {
        return $this->value;
    }
}