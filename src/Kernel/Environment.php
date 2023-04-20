<?php

declare(strict_types=1);

namespace Kernel;

enum Environment: string
{
    case DEVELOP = 'develop';
    case PRODUCTION = 'production';

    public static function current(): self
    {
        return self::tryFrom($_ENV['ENVIRONMENT']);
    }
}