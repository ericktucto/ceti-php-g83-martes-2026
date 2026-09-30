<?php declare(strict_types=1);

use App\Core\Conexion;
use App\Repositories\ProductoDatabaseRepository;

require __DIR__ . '/../vendor/autoload.php';

$con = Conexion::obtener();

$repo = new ProductoDatabaseRepository($con);

