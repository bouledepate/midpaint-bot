<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Command\Help;

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Midpaint\Telegram\Command\Command;
use Midpaint\Telegram\Types\Message\Message;

final class HelpCommand extends Command
{
    /** @throws TelegramException */
    public function execute(Message $message): void
    {
        if ($this->validate($message)) {
            Request::sendMessage([
                'chat_id' => $message->chat()->ID()->value(),
                'text' => $this->getMessage(),
                'parse_mode' => 'HTML'
            ]);
        }
    }

    public function validate(Message $message): bool
    {
        return true;
    }

    protected function getMessage(): string
    {
        return "Список доступных команд:\n- /help — Получить список актуальных команд.\n- /prompt — Сгенерировать описание для Midjourney.
        \nДанный список будет пополняться по мере поступления новых обновлений.";
    }
}