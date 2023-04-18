<?php

declare(strict_types=1);

namespace Kernel;

enum Environment: string
{
    case DEVELOP = 'develop';
    case PRODUCTION = 'production';
}