<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Command;

use Midpaint\Telegram\Types\Message\Message;

abstract class Command
{
    abstract public function execute(Message $message): void;
}