<?php declare(strict_types=1);

use App\Core\Conexion;
use App\Models\Producto;

require __DIR__ . '/../vendor/autoload.php';

$id = $_GET['id'];
$nombre = $_GET['nombre'];
$precio = $_GET['precio'];

$con = Conexion::obtener();

try {
    $query = "UPDATE productos SET nombre=:nombre, precio=:precio WHERE id = :id";

    $statement = $con->prepare($query);

    $statement->execute(compact('id', 'nombre', 'precio'));

    dd("Actualizacion existosa");

} catch (PDOException $e) {
    dd($e->getMessage());
}