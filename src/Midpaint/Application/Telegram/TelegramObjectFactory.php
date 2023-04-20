<?php

declare(strict_types=1);

namespace Midpaint\Application\Telegram;

use Midpaint\Telegram\Types\Message\Message;

interface TelegramObjectFactory
{
    public function produce(array $message): Message;
}