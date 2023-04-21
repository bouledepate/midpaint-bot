<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Storage;

use Midpaint\Telegram\Types\Message\Message;

final class TelegramRepository
{
    public function __construct(
        protected readonly TelegramStorageClient $client
    )
    {
    }

    public function storeUser(Message $message): void
    {
    }
}