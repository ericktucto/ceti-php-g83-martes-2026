<?php

namespace App\Core;

use DI\Container;
use DI\ContainerBuilder;
use League\Route\Router;
use Yiisoft\PsrEmitter\SapiEmitter;

class Aplicacion
{
    public Container $contenedor;
    private Router $router;

    public function __construct(
        array $definiciones,
    ) {
        $builder = new ContainerBuilder();
        $builder->addDefinitions(
            $definiciones,
        );
        $this->contenedor = $builder->build();
        $this->router = $this->contenedor->get('router');
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function run(): void
    {
        // 1. Obtener la peticion(request) cliente
        $request = $this->contenedor->get('request');

        // 2. Construir la respuesta (response)
        $response = $this->router->dispatch(
            $request,
        );

        // 3. Emitir el response
        $emitter = new SapiEmitter();
        $emitter->emit($response);
    }
}