<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\Command;

use Midpaint\Telegram\Commands\Command;
use Midpaint\Telegram\Commands\StartCommand;
use Midpaint\Telegram\Commands\PromptCommand;
use Midpaint\Telegram\Commands\UndefinedCommand;
use Midpaint\Telegram\Types\Entity\Entity;
use Midpaint\Telegram\Types\Entity\Type;
use Midpaint\Telegram\Types\Message\Message;
use Midpaint\Application\Telegram\TelegramCommandResolver;

final class CommandResolver implements TelegramCommandResolver
{
    public function resolve(Message $message): ?Command
    {
        $cmd = $this->parseMessageText($message);
        if (is_null($cmd)) {
            $cmd = AvailableCommand::UNDEFINED;
        }

        return match ($cmd) {
            AvailableCommand::START => new StartCommand(),
            AvailableCommand::PROMPT => new PromptCommand(),
            AvailableCommand::UNDEFINED => new UndefinedCommand(),
            false => null
        };
    }

    private function parseMessageText(Message $message): AvailableCommand|false|null
    {
        /** @var Entity $entity */
        $entity = array_filter($message->entities(), function (Entity $entity) {
            return $entity->type() == Type::COMMAND ? $entity : null;
        })[0] ?? null;

        if (is_null($entity)) {
            return false;
        }

        $cmd = substr($message->text()->value(), $entity->offset()->value(), $entity->length()->value());
        return AvailableCommand::tryFrom(str_replace('/', '', $cmd));
    }
}