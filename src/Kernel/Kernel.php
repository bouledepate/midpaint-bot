<?php

declare(strict_types=1);

namespace Kernel;

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;
use Slim\App;
use Exception;

final class Kernel
{
    protected App $app;
    protected Telegram $bot;

    /** @throws Exception */
    public function __construct()
    {
        $this->app = $this->build();
    }

    /** @throws Exception */
    protected function build(): App
    {
        $factory = new KernelFactory();
        return $factory->createApplication();
    }

    public function run(): void
    {
        $this->app->run();
    }
}