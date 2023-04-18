<?php

declare(strict_types=1);

namespace Kernel;

use App\Provider;
use Exception;
use Kernel\Components\Routing\Router;
use Slim\App;
use Slim\Factory\AppFactory;
use Psr\Container\ContainerInterface;

final class KernelFactory
{
    private const ROOT_PATH = __DIR__ . '/../../';

    /** @throws Exception */
    public function createApplication(): App
    {
        $container = $this->createContainer();
        return $this->createNewApplication($container);
    }

    /** @throws Exception */
    protected function createContainer(): ContainerInterface
    {
        return Definitions::container(realpath(self::ROOT_PATH));
    }

    protected function createNewApplication(ContainerInterface $container): App
    {
        return $this->applyConfigurations(
            AppFactory::createFromContainer($container)
        );
    }

    protected function applyConfigurations(App $app): App
    {
        $this->applyRoutes($app);
        $this->applyMiddlewares($app);

        return $app;
    }

    protected function applyRoutes(App $app): void
    {
        $routes = Provider::routes();
        Router::apply($app, ...$routes);
    }

    protected function applyMiddlewares(App $app): void
    {
        $app->addBodyParsingMiddleware();
        $app->addErrorMiddleware(
            (bool)$_ENV['ERROR_DETAILS'],
            (bool)$_ENV['LOG_ERRORS'],
            (bool)$_ENV['LOG_ERROR_DETAILS']
        );
    }
}