<?php

class Producto
{
    public function __construct(
        public string $nombre,
        protected float $precio,
    ) {
    }

    // setters
    public function setPrecio(float $precio): void
    {
        if ($precio >= 0) {
            $this->precio = $precio;
        } else {
            $this->precio = 0;
        }
    }

    // getters
    public function getPrecio(): float
    {
        return $this->precio;
    }
}

$laptop = new Producto("Macbook Air 14", 3500);

$nuevo_valor = -3400;

//if ($nuevo_valor >= 0) {
//    $laptop->precio = $nuevo_valor;
//}
$laptop->setPrecio($nuevo_valor);

echo "{$laptop->getPrecio()}\n";

class Cliente
{
    public function __construct(
        protected string $nombre,
        protected string $apellido,
    ) {
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function getNombreCompleto(): string
    {
        return "{$this->getNombre()} {$this->getApellido()}";
    }
}

$erick = new Cliente("Erick", "Tucto");

echo "{$erick->getNombreCompleto()}\n";
