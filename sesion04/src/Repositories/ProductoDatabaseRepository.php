<?php

namespace App\Repositories;

use App\Models\Producto;
use Override;
use PDO;

class ProductoDatabaseRepository implements IProductoRepository
{
    public function __construct(
        private PDO $con,
    ) {
    }

    #[Override]
    public function todosLosProductos(): array
    {
        $query = "SELECT id, nombre, precio FROM productos";

        $statement = $this->con->prepare($query);

        $statement->execute();

        return array_map(fn($fila) => Producto::fromArray($fila), $statement->fetchAll());
    }

    #[Override]
    public function crearProducto(string $nombre, int $precio): Producto
    {
        $query = "INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)";

        $statement = $this->con->prepare($query);

        $statement->execute([
            "nombre" => $nombre,
            "precio" => $precio,
        ]);
        return $this->obtenerProducto($this->con->lastInsertId());
    }

    #[Override]
    public function obtenerProducto(int $id): Producto
    {
        $query = "SELECT id, nombre, precio FROM productos WHERE id = ?";
        $statement = $this->con->prepare($query);
        $statement->execute([$id]);
        
        $filas = array_map(fn($fila) => Producto::fromArray($fila), $statement->fetchAll());

        return $filas[0];
    }

    #[Override]
    public function actualizarProducto(int $id, string $nombre, int $precio): Producto
    {
        $query = "UPDATE productos SET nombre=:nombre, precio=:precio WHERE id = :id";

        $statement = $this->con->prepare($query);

        $statement->execute(compact('id', 'nombre', 'precio'));

        return $this->obtenerProducto($id);
    }

    #[Override]
    public function eliminarProducto(int $id): bool
    {
        $query = "DELETE FROM productos WHERE id = :id";

        $statement = $this->con->prepare($query);

        $statement->execute(compact('id'));

        return true;
    }
}