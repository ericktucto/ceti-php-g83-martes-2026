<?php declare(strict_types=1);

use App\Core\Conexion;
use App\Models\Producto;

require __DIR__ . '/../vendor/autoload.php';

$con = Conexion::obtener();

try {
    $query = "SELECT id, nombre, precio FROM productos";

    $statement = $con->prepare($query);

    $statement->execute();

    $filas = array_map(fn($fila) => Producto::fromArray($fila), $statement->fetchAll());

    dd($filas);

} catch (PDOException $e) {
    dd($e->getMessage());
}

