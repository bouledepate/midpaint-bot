<?php

declare(strict_types=1);

namespace Kernel\Components\ValueObject;

use DateTimeImmutable;
use DateTimeInterface;

abstract class DateValueObject extends ValueObject
{
    protected DateTimeInterface $value;

    public function format(string $format = DateTimeInterface::ATOM): string
    {
        $result = $this->value->format($format);

        return $this->isValidDatetimeString($result, $format) ? $result : "";
    }

    private function isValidDatetimeString(string $datetime, string $format): bool
    {
        $date = DateTimeImmutable::createFromFormat($format, $datetime);
        return $date !== false && $date->format($format) === $datetime;
    }

    public function timestamp(): int
    {
        return $this->value->getTimestamp();
    }

    public function equals(ValueObject $object): bool
    {
        return $object instanceof DateValueObject && $object->timestamp() === $this->timestamp();
    }

    public function __toString(): string
    {
        return $this->format();
    }
}