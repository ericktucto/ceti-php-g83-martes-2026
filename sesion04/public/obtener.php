<?php declare(strict_types=1);

use App\Core\Conexion;
use App\Models\Producto;

require __DIR__ . '/../vendor/autoload.php';

$id = $_GET['id']; // 1
//$id = "0' or 1 = 1 --";

$con = Conexion::obtener();

try {
    //$query = "SELECT id, nombre, precio FROM productos WHERE id = '{$id}'";
    $query = "SELECT id, nombre, precio FROM productos WHERE id = ?";

    $statement = $con->prepare($query);

    $statement->execute([
        $id
    ]);

    $filas = array_map(fn($fila) => Producto::fromArray($fila), $statement->fetchAll());

    dd($filas);

} catch (PDOException $e) {
    dd($e->getMessage());
}

