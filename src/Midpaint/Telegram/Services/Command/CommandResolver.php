<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\Command;

use Midpaint\Telegram\Command\Command;
use Midpaint\Telegram\Command\Help\HelpCommand;
use Midpaint\Telegram\Command\Prompt\PromptCommand;
use Midpaint\Telegram\Command\Start\StartCommand;
use Midpaint\Telegram\Command\Undefined\UndefinedCommand;
use Midpaint\Telegram\Types\Entity\Entity;
use Midpaint\Telegram\Types\Entity\Type;
use Midpaint\Telegram\Types\Message\Message;
use Midpaint\Application\Telegram\TelegramCommandResolver;
use Midpaint\Telegram\Types\Message\Text;

final class CommandResolver implements TelegramCommandResolver
{
    public function resolve(Message $message): ?Command
    {
        $command = $this->parse($message);

        return !is_null($command) ? match ($command) {
            AvailableCommand::START => new StartCommand(),
            AvailableCommand::HELP => new HelpCommand(),
            AvailableCommand::PROMPT => new PromptCommand(),
            AvailableCommand::UNDEFINED => new UndefinedCommand()
        } : null;
    }

    private function parse(Message $message): AvailableCommand|null
    {
        /** @var Entity $entity */
        $entity = array_filter($message->entities() ?? [], function (Entity $entity) {
            return $entity->type() === Type::COMMAND;
        })[0] ?? null;

        if (is_null($entity)) {
            return null;
        }

        $command = AvailableCommand::tryFrom(
            $this->clearCommandTitle($message, $entity)
        );

        return $command ?? AvailableCommand::UNDEFINED;
    }

    private function clearCommandTitle(Message $message, Entity $entity): string
    {
        $cmd = substr(
            $message->text()->value(),
            $entity->offset()->value(),
            $entity->length()->value()
        );

        if (str_contains($cmd, $_ENV['BOT_USERNAME'])) {
            $cmd = str_replace($_ENV['BOT_USERNAME'], '', $cmd);
        }

        return $cmd;
    }
}