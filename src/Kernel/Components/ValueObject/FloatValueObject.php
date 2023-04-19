<?php

declare(strict_types=1);

namespace Kernel\Components\ValueObject;

abstract class FloatValueObject extends ValueObject
{
    protected float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    public function equals(ValueObject $object): bool
    {
        return $object instanceof FloatValueObject && $this->value == $object->value;
    }
}