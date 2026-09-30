<?php declare(strict_types=1);

use App\Models\Producto;
use App\Session;
use Carbon\Carbon;

require __DIR__ . '/../vendor/autoload.php';

$ahora = Carbon::now();

$datos = [
    'nombre' => 'Macbook Air 14',
    'precio' => 4500,
];

$producto = new Producto('iPhone 18 Pro', 5000);
$laptop = Producto::fromArray($datos);

//dump($producto, $laptop, Carbon::yesterday('America/Lima'));


function main() {
    $sesion1 = Session::start('erick@ericktucto.com');
}

function main2() {
    $sesion1 = Session::start('noesuncorreo');
    dump($sesion1->nombre);
}
$s = new Session('Hola');
main();
main2();
main2();


