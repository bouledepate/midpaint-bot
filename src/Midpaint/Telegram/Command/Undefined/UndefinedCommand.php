<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Command\Undefined;

use Longman\TelegramBot\Request;
use Midpaint\Telegram\Command\Command;
use Midpaint\Telegram\Types\Message\Message;
use Longman\TelegramBot\Exception\TelegramException;

final class UndefinedCommand extends Command
{
    /** @throws TelegramException */
    public function execute(Message $message): void
    {
        if ($this->validate($message)) {
            Request::sendMessage([
                'chat_id' => $message->chat()->ID()->value(),
                'text' => $this->getMessage(),
                'parse_mode' => 'HTML',
                'reply_to_message_id' => $message->ID()->value()
            ]);
        }
    }

    public function validate(Message $message): bool
    {
        return true;
    }

    private function getMessage(): string
    {
        return "Извините, но эта команда мне неизвестна. Вы можете запросить список актуальных команд, выполнив следующий запрос: /help .";
    }
}