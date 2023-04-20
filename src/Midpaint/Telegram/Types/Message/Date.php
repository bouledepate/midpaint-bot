<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Types\Message;

use DateTimeInterface;
use Kernel\Components\ValueObject\DateValueObject;

final class Date extends DateValueObject
{
    public function __construct(DateTimeInterface $date)
    {
        $this->value = $date;
    }
}