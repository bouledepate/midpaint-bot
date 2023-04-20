<?php

declare(strict_types=1);

namespace Midpaint\Application\Telegram;

use Midpaint\Telegram\Commands\Command;
use Midpaint\Telegram\Types\Message\Message;

interface TelegramCommandResolver
{
    public function resolve(Message $message): ?Command;
}