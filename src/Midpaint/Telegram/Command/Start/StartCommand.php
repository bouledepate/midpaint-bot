<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Command\Start;

use Midpaint\Telegram\Command\Command;
use Midpaint\Telegram\Types\Message\Message;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Exception\TelegramException;

final class StartCommand extends Command
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
        return "Приветствую, я MidpaintBot. Я был создан для создания описаний-подсказок - <i>prompts</i> - необходимых для генерации качественных изображений посредством Midjourney AI.\n\n"
            . "Моя основная задача - это транслировать вашу идею к обученной модели ChatGPT, и после обработки вернуть её в расширенном виде.\n\n"
            . "Чтобы создать первое описание, воспользуйтесь командой /prompt.";
    }
}