<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Command\Prompt;

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Midpaint\Telegram\Command\Command;
use Midpaint\Telegram\Types\Message\Message;

final class PromptCommand extends Command
{
    /** @throws TelegramException */
    public function execute(Message $message): void
    {
        if ($this->validate($message)) {
            Request::sendMessage([
                'chat_id' => $message->chat()->ID()->value(),
                'text' => $this->getMessage(),
//                'parse_mode' => 'HTML'
            ]);
        }
    }

    public function validate(Message $message): bool
    {
        return true;
    }

    protected function getMessage(): string
    {
        return 'Скоро здесь появится интеграция с ChatGPT 🚀';
    }
}