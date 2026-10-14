<?php

use App\Core\ResponseFactory;
use App\Definitions\EloquentConexionDefinition;
use App\Services\Contracts\JWTInterface;
use App\Services\JWTFirebaseService;
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
    JWTInterface::class => fn() => new JWTFirebaseService(
        $_ENV['JWT_SECRET'],
    ),
    ConnectionResolverInterface::class => factory([EloquentConexionDefinition::class, 'create']),
    'config_database' => [
        'default' => 'pg',
        'pg' => [
            'driver' => 'pgsql',
            'user' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'dbname' => $_ENV['DB_DATABASE'],
        ],
    ],
];
