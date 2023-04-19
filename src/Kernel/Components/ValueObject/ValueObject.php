<?php

declare(strict_types=1);

namespace Kernel\Components\ValueObject;

abstract class ValueObject implements \Stringable
{
    public abstract function equals(ValueObject $object): bool;
}