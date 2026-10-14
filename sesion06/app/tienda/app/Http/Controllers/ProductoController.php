<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Response;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Producto::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');

        $producto = new Producto();
        $producto->nombre = $nombre;
        $producto->precio = $precio;
        $producto->save();

        return response($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->save();

        return $producto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return [
            'message' => 'Producto eliminado',
        ];
    }
}
