<?php

interface Pagable
{
    public function total(): float;
}

class Producto implements Pagable
{
    protected int $cantidad = 0;

    public function __construct(
        protected string $nombre,
        protected float $precio,
    ) {
    }

    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad >= 0 ? $cantidad : 0;
    }

    public function total(): float
    {
        return $this->cantidad * $this->precio;
    }
}

class Suscripcion implements Pagable
{
    public function __construct(
        protected string $servicio,
        protected float $precio,
    ) {
    }


    public function total(): float
    {
        return $this->precio;
    }
}

$teclado = new Producto("Teclado mecanico", 179.9);

$teclado->setCantidad(2);

$pelicula = new Suscripcion("Peliculas", 29.9);

function procesarPago(Pagable $pagable)
{
    $total = $pagable->total();
    // codigo genera el pago
    echo "{$total}\n";
}

procesarPago($teclado);
procesarPago($pelicula);