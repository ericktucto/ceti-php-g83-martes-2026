<?php

require __DIR__ . '/../vendor/autoload.php';

use Erick\Tienda\Modelos\Producto;

$producto = new Producto("iPhone 18 PRO", 5000);

dd($producto);
