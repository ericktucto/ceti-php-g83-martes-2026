<?php

declare(strict_types=1);

class Producto
{
    // para crear atributos
    // [visibilidad] [tipo] [propieda] = [valor por defecto];
    public string $nombre = 'Sin nombre';
    public float $precio = 0;
}

$laptop = new Producto();

var_dump($laptop);
echo $laptop->nombre . "\n";
echo $laptop->precio . "\n";


class Cliente
{
    public string $nombre = '';

    // para crear metodos
    // [visibilidad] [static] function [nombre del metodo]([tipo] [variable]): [tipo de retorno] {}
    public function saludar(): string
    {
        return "Hola, soy {$this->nombre}";
    }
}

$ana = new Cliente();
$ana->nombre = 'Ana';
$jorge = new Cliente();
$jorge->nombre = 'Jorge';

echo $ana->saludar() . "\n";
echo $jorge->saludar() . "\n";

class Vendedor
{
    public string $nombre = '';
    public string $email = '';

    public function __construct(string $nombre, string $email)
    {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function saludar(): string
    {
        return "Hola, soy {$this->nombre}";
    }
}

$pedro = new Vendedor("Pedro", "pedro@gmail.com");
echo $pedro->saludar() . "\n";

class Admin
{
    public function __construct(
        public string $nombre,
        public string $email,
        public bool $inactivo = false,
        string $depurar = '',
    ) {
    }

    public function saludar(): string
    {
        return "Hola, soy {$this->nombre}, un administrador";
    }
}

$erick = new Admin("Erick", "erick@ericktucto.com");
echo $erick->saludar() . "\n";
var_dump($erick->inactivo);

$john = new Admin("John", "j@ericktucto.com", true);
var_dump($john->inactivo);
//var_dump($john->depurar);
