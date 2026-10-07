<?php

use App\Controllers\ProductoController;
use App\Core\Aplicacion;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require __DIR__ . '/../vendor/autoload.php';

$app = new Aplicacion(
    require __DIR__ . '/../config/definitions.php',
);

$app->getRouter()->get('/', function (ServerRequestInterface $request): ResponseInterface {
    $response = new Response(
        200, [], 'Hola Erick'
    );
    return $response;
});

$app->getRouter()->get('/api/productos', [ProductoController::class, 'index']);

$app->getRouter()->post('/api/productos', [ProductoController::class, 'store']);

// /api/productos/2
$app->getRouter()->put('/api/productos', [ProductoController::class, 'update']);

$app->getRouter()->delete('/api/productos/{id}', [ProductoController::class, 'delete']);

$app->run();

# 1. Contenedor de Injeccion de depencias (php-di)
# 2. Router (Route de thephpleague)
# 3. Paquete de PSR-7 (Guzzle)
# 4. Emitter de respuestas
