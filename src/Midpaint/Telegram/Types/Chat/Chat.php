<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Chat;

abstract class Chat
{
    public function __construct(
        protected readonly ID       $id,
        protected readonly Type     $type,
        protected readonly Username $username
    )
    {
    }

    public function ID(): ID
    {
        return $this->id;
    }

    public function type(): Type
    {
        return $this->type;
    }

    public function username(): Username
    {
        return $this->username;
    }
}