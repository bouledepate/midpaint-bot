<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\TypeCast\Handlers;

use Midpaint\Telegram\Services\TypeCast\AbstractTypeHandler;
use Midpaint\Telegram\Types\Chat\Chat;
use Midpaint\Telegram\Types\Chat\FirstName;
use Midpaint\Telegram\Types\Chat\ID;
use Midpaint\Telegram\Types\Chat\LastName;
use Midpaint\Telegram\Types\Chat\PrivateChat;
use Midpaint\Telegram\Types\Chat\PublicChat;
use Midpaint\Telegram\Types\Chat\Title;
use Midpaint\Telegram\Types\Chat\Type;
use Midpaint\Telegram\Types\Chat\Username;

final class ChatHandler extends AbstractTypeHandler
{
    public function handle(array $data): array
    {
        if (isset($data[$this->field()])) {
            $data[$this->field()] = $this->cast(
                data: $data[$this->field()]
            );
        }

        return parent::handle($data);
    }

    protected function cast(array $data): Chat
    {
        list($id, $type, $username) = [
            new ID($data['id']),
            Type::tryFrom($data['type']),
            new Username($data['username'] ?? null)
        ];

        return match ($type) {
            Type::PRIVATE => new PrivateChat(
                $id,
                $type,
                $username,
                new FirstName($data['first_name'] ?? null),
                new LastName($data['last_name'] ?? null)
            ),
            default => new PublicChat(
                $id,
                $type,
                $username,
                new Title($data['title'] ?? null)
            )
        };
    }

    protected function field(): string
    {
        return 'chat';
    }
}