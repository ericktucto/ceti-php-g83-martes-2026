<?php

$edad = 18;

if ($edad >= 18) {
    echo "Eres mayor de edad\n";
}

if ($edad >= 30) {
    echo "Eres mayor de 30 años\n";
} else {
    echo "Eres menor de 30 años\n";
}

$nota_examen = 19; // 20-0

if ($nota_examen >= 18) {
    echo "Felicidades, aprobaste con nota sobresaliente\n";
} elseif ($nota_examen >= 15) {
    echo "Felicidades, aprobaste\n";
} elseif ($nota_examen >= 11) {
    echo "Aprobaste\n";
} else {
    echo "Desaprobaste\n";
}

$i = 1;

// Este switch:

switch ($i) {
    case 0:
        echo "i igual 0\n";
        break;
    case 1:
        echo "i igual 1\n";
        break;
    case 2:
        echo "i igual 2\n";
        break;
    default:
       echo "i no es igual a 2, ni a 1, ni a 0.\n";
}

$food = 'cake';

$resultado = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};

var_dump($resultado);

$food = 'orange';

$resultado = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
    default => "No reconozco la fruta {$food}",
};

var_dump($resultado);

$age = 18;

$output = match (true) {
    $age < 2 => "Bebé",
    $age < 13 => "Niño",
    $age <= 19 => "Adolescente",
    $age >= 40 => "Adulto",
    $age > 19 => "Adulto joven",
};

var_dump($output);

$food = 'pastel';

$resultado = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake', 'pastel' => 'This food is a cake',
    default => "No reconozco la fruta {$food}",
};
var_dump($resultado);

echo "Operador ternario\n";

$edad = 18;
$es_adulto = $edad >= 18 ? 'Sí' : 'No';

var_dump($es_adulto);

$edad = 17;
var_dump($edad >= 18 ?: 'No');

