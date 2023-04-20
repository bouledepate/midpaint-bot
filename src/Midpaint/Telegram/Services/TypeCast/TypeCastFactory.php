<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\TypeCast;

use DateTimeImmutable;
use Midpaint\Telegram\Types\Message\ID;
use Midpaint\Telegram\Types\Message\Text;
use Midpaint\Telegram\Types\Message\Date;
use Midpaint\Telegram\Types\Message\Message;
use Midpaint\Application\Telegram\TelegramObjectFactory;
use Midpaint\Telegram\Services\TypeCast\Handlers\ChatHandler;
use Midpaint\Telegram\Services\TypeCast\Handlers\FromHandler;
use Midpaint\Telegram\Services\TypeCast\Handlers\EntitiesHandler;

final class TypeCastFactory implements TelegramObjectFactory
{
    public function __construct(
        protected readonly ChatHandler     $chatHandler,
        protected readonly EntitiesHandler $entitiesHandler,
        protected readonly FromHandler     $fromHandler
    )
    {
    }

    public function produce(array $message): Message
    {
        $this->chatHandler->next($this->entitiesHandler)
            ->next($this->fromHandler);

        return $this->format(
            $this->chatHandler->handle($message)
        );
    }

    protected function format(array $message): Message
    {
        return new Message(
            id: new ID($message['message_id']),
            chat: $message['chat'],
            date: new Date(DateTimeImmutable::createFromFormat(
                format: DATE_ATOM,
                datetime: date(DATE_ATOM, $message['date']),
                timezone: new \DateTimeZone('UTC')
            )),
            text: new Text($message['text'] ?? null),
            from: $message['from'] ?? null,
            entities: $message['entities'] ?? null
        );
    }
}