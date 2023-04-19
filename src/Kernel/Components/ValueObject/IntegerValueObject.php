<?php

declare(strict_types=1);

namespace Kernel\Components\ValueObject;

abstract class IntegerValueObject extends ValueObject
{
    protected int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    public function equals(ValueObject $object): bool
    {
        return $object instanceof IntegerValueObject && $this->value == $object->value;
    }
}