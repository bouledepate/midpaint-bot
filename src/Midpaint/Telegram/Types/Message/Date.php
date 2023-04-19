<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Message;

use DateTimeImmutable;
use DateTimeInterface;
use Kernel\Components\ValueObject\DateValueObject;

final class Date extends DateValueObject
{
    public function __construct(DateTimeInterface $time)
    {
        $this->value = $time;
    }

    public static function fromString(string $date): self
    {
        return new self(
            DateTimeImmutable::createFromFormat(DATE_ATOM, trim($date))
        );
    }
}