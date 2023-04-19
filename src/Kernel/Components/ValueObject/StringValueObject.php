<?php

declare(strict_types=1);

namespace Kernel\Components\ValueObject;

abstract class StringValueObject extends ValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(ValueObject $object): bool
    {
        return $object instanceof StringValueObject && $this->value == $object->value;
    }
}