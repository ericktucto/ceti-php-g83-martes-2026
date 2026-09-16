<?php

declare(strict_types=1);

var_dump((string) true);

function saludar(string $nombre, string $inicio = 'Hola'): mixed
{
    return "{$inicio}, {$nombre}";
}

$mensaje = saludar('Erick', 'Buenas noches');

var_dump($mensaje);

function hola(
    ?string $nombre,
    ?string $variable1,
    string|int|float $varible2,
    mixed $variable3,
    string $inicio = 'Hola',
): mixed {
    return "{$inicio}, {$nombre}";
}


//-----------------------

function hola1()
{
    echo "Funcion hola\n";
    return true;
}

function saludar2()
{
    echo "Funcion saludar\n";
    return true;
}

var_dump(hola1() || saludar2());

$y = 0;

function habito(): string {
    $y = 15;
    return "Hola {$y}";
}

habito();

var_dump($y);


function hola3()
{
    echo "Funcion hola de 3\n";
    return false;
}

function saludar3()
{
    echo "Funcion saludar de 3\n";
    return true;
}

var_dump(hola3() && saludar3());

$x = 8;
function habito2(): string {
    return "Hola {$x}";
}

if (true) {
    $noexisto = "Hola, no existo";
}

var_dump($noexisto);
