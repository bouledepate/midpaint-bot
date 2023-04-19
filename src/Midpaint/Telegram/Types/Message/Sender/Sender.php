<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Message\Sender;

final class Sender
{
    public function __construct(
        protected ID        $ID,
        protected FirstName $firstName,
        protected LastName  $lastName,
        protected Username  $username,
        protected bool      $bot
    )
    {
    }

    public function ID(): ID
    {
        return $this->ID;
    }

    public function firstName(): FirstName
    {
        return $this->firstName;
    }

    public function lastName(): LastName
    {
        return $this->lastName;
    }

    public function username(): Username
    {
        return $this->username;
    }

    public function isBot(): bool
    {
        return $this->bot;
    }
}