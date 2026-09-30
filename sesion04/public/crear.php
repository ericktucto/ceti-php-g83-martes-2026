<?php declare(strict_types=1);

use App\Core\Conexion;
use App\Models\Producto;

require __DIR__ . '/../vendor/autoload.php';

$nombre = $_GET['nombre'];
$precio = $_GET['precio'];

$con = Conexion::obtener();

try {
    $query = "INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)";

    $statement = $con->prepare($query);

    $statement->execute([
        "nombre" => $nombre,
        "precio" => $precio,
    ]);

    $id = $con->lastInsertId();

    $query = "SELECT id, nombre, precio FROM productos WHERE id = ?";
    $statement = $con->prepare($query);
    $statement->execute([$id]);
    
    $filas = array_map(fn($fila) => Producto::fromArray($fila), $statement->fetchAll());

    dd("Guardado existoso", $filas);
} catch (PDOException $e) {
    dd($e->getMessage());
}

