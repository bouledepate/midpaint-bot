<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Chat;

final class PublicChat extends Chat
{
    public function __construct(
        ID                       $id,
        Type                     $type,
        Username                 $username,
        protected readonly Title $title
    )
    {
        parent::__construct($id, $type, $username);
    }

    public function title(): Title
    {
        return $this->title;
    }
}