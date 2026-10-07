<?php

namespace App\Controllers;

use App\Models\Producto;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\ConnectionResolverInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductoController
{
    public function __construct(
        ConnectionResolverInterface $resolver
    ) {
        Producto::setConnectionResolver($resolver);
    }

    public function index()
    {
        # SELECT id, nombre, precio FROM productos
        return Producto::all(['id', 'nombre', 'precio']);
    }

    public function store(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getBody()->getContents();
        $json = json_decode($body, true);

        # insert into productos("nombre", "precio") values (:nombre, :precio)
        $producto = new Producto();
        $producto->nombre = $json['nombre'];
        $producto->precio = $json['precio'];
        $producto->save();

        return new Response(201);
    }

    public function update(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $id = $args['id'];

        $producto = Producto::find($id);
        if (!$producto) {
            return new Response(404, [], json_encode([
                'message' => 'Producto no encontrado',
            ]));
        }

        $body = $request->getBody()->getContents();
        $json = json_decode($body, true);

        $producto->nombre = $json['nombre'];
        $producto->precio = $json['precio'];
        $producto->save();

        return new Response(200, [], json_encode($producto));
    }

    public function delete(ServerRequestInterface $request, array $args): ResponseInterface
    {
        $id = $args['id'];

        $producto = Producto::find($id);
        if (!$producto) {
            return new Response(404, [], json_encode([
                'message' => 'Producto no encontrado',
            ]));
        }

        $producto->delete();

        return new Response(200, [], json_encode([
            'message' => 'Producto eliminado'
        ]));
    }
}