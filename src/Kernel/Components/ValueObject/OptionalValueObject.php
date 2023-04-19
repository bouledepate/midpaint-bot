<?php

declare(strict_types=1);

namespace Kernel\Components\ValueObject;

abstract class OptionalValueObject extends ValueObject
{
    public function __construct(
        protected mixed $value = null
    )
    {
    }

    public function value(): mixed
    {
        return $this->value;
    }

    public function __toString()
    {
        return (string)$this->value;
    }

    public function equals(ValueObject $object): bool
    {
        return $this->value === $object->value;
    }
}