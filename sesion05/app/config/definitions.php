<?php

use App\Core\ResponseFactory;
use App\Definitions\EloquentConexionDefinition;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Database\ConnectionResolverInterface;
use League\Route\Router;
use League\Route\Strategy\JsonStrategy;
use Psr\Container\ContainerInterface;

use function DI\factory;

return [
    'request' => fn() => ServerRequest::fromGlobals(),
    'router' => function (ContainerInterface $contenedor) {
        $strategy = new JsonStrategy(new ResponseFactory());
        $strategy->setContainer($contenedor);

        $router = new Router();
        $router->setStrategy($strategy);

        return $router;
    },
    ConnectionResolverInterface::class => factory([EloquentConexionDefinition::class, 'create']),
    'config_database' => [
        'default' => 'pg',
        'pg' => [
            'driver' => 'pgsql',
            'user' => 'erick',
            'password' => '1234',
            'host' => 'basededatos',
            'dbname' => 'tienda',
            /*
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'dbname' => $_ENV['DB_DATABASE'],
            */
        ],
    ],
];
