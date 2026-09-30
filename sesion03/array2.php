<?php

/*
extract($usuario);

$nombre, $email, $activo,
$nombre = $usuario["nombre"];
*/

$variable_vulnerable = false;

$datos = [
    "nombre" => "Erick",
    "email" => "erick@erictucto.com",
    "variable_vulnerable" => true,
];

foreach ($datos as $key => $value) {
    $$key = $value;
}

var_dump(
    $nombre,
    $email,
    $variable_vulnerable
);
