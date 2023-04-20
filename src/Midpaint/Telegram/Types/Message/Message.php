<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Message;

use Midpaint\Telegram\Types\Chat\Chat;
use Midpaint\Telegram\Types\User\User;

final class Message
{
    public function __construct(
        protected readonly ID     $id,
        protected readonly Chat   $chat,
        protected readonly Date   $date,
        protected readonly Text  $text,
        protected readonly ?User  $from,
        protected readonly ?array $entities,
    )
    {
    }

    public function ID(): ID
    {
        return $this->id;
    }

    public function chat(): Chat
    {
        return $this->chat;
    }

    public function date(): Date
    {
        return $this->date;
    }

    public function text(): ?Text
    {
        return $this->text;
    }

    public function from(): ?User
    {
        return $this->from;
    }

    public function entities(): ?array
    {
        return $this->entities;
    }
}