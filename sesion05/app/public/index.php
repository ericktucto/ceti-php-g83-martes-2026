<?php

use App\Controllers\AuthController;
use App\Controllers\ProductoController;
use App\Core\Aplicacion;
use App\Middlewares\AuthMiddleware;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');

$app = new Aplicacion(
    require __DIR__ . '/../config/definitions.php',
);

$app->getRouter()->get('/', function (ServerRequestInterface $request): ResponseInterface {
    $response = new Response(
        200, [], 'Hola Erick'
    );
    return $response;
});

// auth
$app->getRouter()->post('/api/auth/registro', [AuthController::class, 'register']);
$app->getRouter()->post('/api/auth/login', [AuthController::class, 'login']);

$app->getRouter()->get('/api/productos', [ProductoController::class, 'index']);

$app->getRouter()->post('/api/productos', [ProductoController::class, 'store'])
->middleware($app->contenedor->make(AuthMiddleware::class));

// /api/productos/2
$app->getRouter()->put('/api/productos/{id}', [ProductoController::class, 'update'])
->middleware($app->contenedor->make(AuthMiddleware::class));

$app->getRouter()->delete('/api/productos/{id}', [ProductoController::class, 'delete'])
->middleware($app->contenedor->make(AuthMiddleware::class));

$app->run();

# 1. Contenedor de Injeccion de depencias (php-di)
# 2. Router (Route de thephpleague)
# 3. Paquete de PSR-7 (Guzzle)
# 4. Emitter de respuestas
