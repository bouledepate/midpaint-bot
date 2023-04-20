<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Chat;

final class PrivateChat extends Chat
{
    public function __construct(
        ID                           $id,
        Type                         $type,
        Username                     $username,
        protected readonly FirstName $firstName,
        protected readonly LastName  $lastName
    )
    {
        parent::__construct($id, $type, $username);
    }

    public function firstName(): FirstName
    {
        return $this->firstName;
    }

    public function lastName(): LastName
    {
        return $this->lastName;
    }
}