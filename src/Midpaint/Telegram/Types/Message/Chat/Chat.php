<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Message\Chat;

final class Chat
{
    public function __construct(
        protected ID        $ID,
        protected Type      $type,
        protected Title     $title,
        protected FirstName $firstName,
        protected LastName  $lastName,
        protected Username  $username
    )
    {
    }

    public function ID(): ID
    {
        return $this->ID;
    }

    public function type(): Type
    {
        return $this->type;
    }

    public function title(): Title
    {
        return $this->title;
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
}