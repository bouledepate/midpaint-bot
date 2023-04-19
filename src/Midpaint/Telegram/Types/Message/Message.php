<?php

namespace Midpaint\Telegram\Types\Message;

use Midpaint\Telegram\Types\Message\Chat\Chat;
use Midpaint\Telegram\Types\Message\Sender\Sender;

final class Message
{
    public function __construct(
        protected ID     $ID,
        protected Sender $sender,
        protected Chat   $chat,
        protected Date   $date,
        protected Text   $text
    )
    {
    }

    public function ID(): ID
    {
        return $this->ID;
    }

    public function sender(): Sender
    {
        return $this->sender;
    }

    public function chat(): Chat
    {
        return $this->chat;
    }

    public function date(): Date
    {
        return $this->date;
    }

    public function text(): Text
    {
        return $this->text;
    }
}