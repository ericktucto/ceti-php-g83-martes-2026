<?php

echo "Operador aritmeticos\n";

$numero1 = 18;
$numero2 = 7;

var_dump('suma de numero1 y numero2', $numero1 + $numero2);
var_dump('resta de numero1 y numero2', $numero1 - $numero2);
var_dump('multiplicacion de numero1 y numero2', $numero1 * $numero2);
var_dump('division de numero1 y numero2', $numero1 / $numero2);
var_dump('residuo de numero1 y numero2', $numero1 % $numero2);

echo "Operador comparación\n";

echo "------\n";
var_dump(18 == '18');
var_dump(18 === '18');
echo "------\n";
var_dump($numero1 == $numero2);
var_dump($numero1 > $numero2);
var_dump($numero1 < $numero2);
var_dump($numero1 >= 18);
var_dump($numero1 <= 18);

$edad = 17;

var_dump($edad >= 18);

echo "Operador comparación\n";

echo "el &&\n";
var_dump(true && true);
var_dump(true && false);
var_dump(false && true);
var_dump(false && false);

echo "el ||\n";
var_dump(true || true);
var_dump(true || false);
var_dump(false || true);
var_dump(false || false);

echo "Ejemplo: mayores de 15 años e inscriptos al curso\n";

$edad = 16;
$es_mayor_15 = $edad >= 15;
$esta_inscripto = false;

var_dump($es_mayor_15 && $esta_inscripto);

echo "Operador de negacion\n";
var_dump($esta_inscripto);
var_dump(!$esta_inscripto);

echo "Operador de concatenacion\n";

echo "Hola" . " mundo\n";

$nombre = "Erick";

echo "Hola, que tal " . $nombre . "\n";
echo "Hola, que tal {$nombre}\n";
echo "Hola, que tal $nombre\n";
echo 'Hola, que tal $nombre\n';
echo 'Hola, que tal {$nombre}\n';

echo "\n";
