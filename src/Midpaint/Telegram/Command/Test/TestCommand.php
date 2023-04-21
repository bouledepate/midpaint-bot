<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Command\Test;

use Midpaint\Telegram\Command\Command;
use Midpaint\Telegram\Storage\TelegramRepository;
use Midpaint\Telegram\Types\Message\Message;

final class TestCommand extends Command
{
    public function __construct(
        protected readonly TelegramRepository $repository
    )
    {
    }

    public function execute(Message $message): void
    {
        $this->repository->storeUser($message);
    }

    public function validate(Message $message): bool
    {
        return true;
    }
}