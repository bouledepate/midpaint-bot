<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\User;

final class User
{
    public function __construct(
        protected readonly ID        $id,
        protected readonly FirstName $firstName,
        protected readonly LastName  $lastName,
        protected readonly Username  $username,
        protected readonly bool      $bot
    )
    {
    }

    public function ID(): ID
    {
        return $this->id;
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