<?php

namespace Kernel\Components\MongoDB;

use MongoDB\Collection;

interface CollectionResolver
{
    public function currentCollection(): Collection;
}