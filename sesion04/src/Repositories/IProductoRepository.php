<?php

namespace App\Repositories;

use App\Models\Producto;

interface IProductoRepository
{
    /**
     * @return Producto[]
     */
    public function todosLosProductos(): array;

    public function crearProducto(string $nombre, int $precio): Producto;

    public function obtenerProducto(int $id): Producto;

    public function actualizarProducto(int $id, string $nombre, int $precio): Producto;

    public function eliminarProducto(int $id): bool;
}