<?php declare(strict_types=1);

class Producto
{
    public function __construct(
        public string $nombre,
        public float $precio,
    ) {
    }
}
/*
$carrito = array(

);
*/
// array indexado
$carrito = [
    new Producto("iPhone 18 PRO", 5000),
    new Producto("iPad Mini", 3000),
];

var_dump(
    $carrito
);

var_dump(
    $carrito[0]->nombre,
    count($carrito),
    $carrito[1]->nombre,
    //$carrito[2]?->nombre,
    array_key_exists(2, $carrito),
);

// array asociativo

$producto = [
    "nombre" => "iPhone 18 PRO",
    "precio" => 5000,
];

var_dump(
    $producto,
    $producto["precio"],
    $producto["stock"] ?? 0,
    isset($producto["stock"]) ? $producto["stock"] : 0,
);

$carrito = [
    new Producto("iPhone 18 PRO", 5000),
    new Producto("iPad Mini", 3000),
    new Producto("Macbook Air", 2800),
    new Producto("Teclado mecanico", 180),
    new Producto("Mouse inalambrico", 89.9),
];

$carrito[] = new Producto("Webcam", 49.9);
/*
$carrito = [
    0 => new Producto("iPhone 18 PRO", 5000),
    1 => new Producto("iPad Mini", 3000),
    2 => new Producto("Macbook Air", 2800),
    3 => new Producto("Teclado mecanico", 180),
    4 => new Producto("Mouse inalambrico", 89.9),
];
*/

for ($key = 0; $key < count($carrito); $key++) { 
    echo $carrito[$key]->nombre . "\n";
}

foreach ($carrito as $key => $producto) {
    echo "Key: ({$key}) - Valor: ({$producto->nombre})\n";
}

var_dump(
    array_map(
        function ($producto) {
            return $producto->nombre;
        }, $carrito
    ),
    array_map(
        fn($producto) => $producto->nombre,
        $carrito
    ),
);
echo "Diferencia entre arrow funcion y funcion anonima";

$precio_dolar = 3.3;
function precios_en_dolares(array $carrito, float $pd) {
    var_dump(
        array_map(
            function ($producto) use ($pd) {
                return $producto->precio / $pd;
            }, $carrito
        ),

    );
}

precios_en_dolares($carrito, $precio_dolar);

$precios_dolares = array_map(
    fn($producto) => $producto->precio / $precio_dolar,
    $carrito
);

var_dump(
    array_sum($precios_dolares),
);

var_dump(
    array_filter(
        $carrito,
        fn($producto) => $producto->precio > 1000,
    )
);

var_dump(
    array_reduce(
        $carrito, // 5 productos -> va iterar 5 veces
        function (float $acumulador, Producto $producto) {
            $acumulador += $producto->precio;
            //$acumulador = $acumulador + $producto->precio;

            return $acumulador;
        },
        0
    )
);

$precio = 3000;
$nombre = "iPhone 18 PRO";

var_dump(
    compact('precio', 'nombre'),
    [
        "precio" => 3000,
        "nombre" => "iPhone 18 PRO"
    ]
);

