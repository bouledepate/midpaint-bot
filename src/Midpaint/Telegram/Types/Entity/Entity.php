<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Entity;

use Midpaint\Telegram\Types\User\User;

final class Entity
{
    public function __construct(
        protected readonly Type     $type,
        protected readonly Offset   $offset,
        protected readonly Length   $length,
        protected readonly ?User    $user
    )
    {
    }

    public function type(): Type
    {
        return $this->type;
    }

    public function offset(): Offset
    {
        return $this->offset;
    }

    public function length(): Length
    {
        return $this->length;
    }

    public function user(): ?User
    {
        return $this->user;
    }
}