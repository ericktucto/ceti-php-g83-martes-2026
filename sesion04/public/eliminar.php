<?php declare(strict_types=1);

use App\Core\Conexion;

require __DIR__ . '/../vendor/autoload.php';

$id = $_GET['id'];

$con = Conexion::obtener();

try {
    $query = "DELETE FROM productos WHERE id = :id";

    $statement = $con->prepare($query);

    $statement->execute(compact('id'));

    dd("Eliminacion existosa");

} catch (PDOException $e) {
    dd($e->getMessage());
}