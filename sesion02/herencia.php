<?php declare(strict_types=1);

class Producto
{
    public function __construct(
        protected string $nombre,
        protected float $precio,
    ) {
    }

    public function describir(): string
    {
        $this->precioConCupon("USUARIONUEVO");
        return "{$this->nombre} - S/ {$this->precio}";
    }

    private function precioConCupon(string $cupon): float
    {
        return strlen($cupon);
    }
}

$teclado = new Producto("Teclado mecanico", 179.9);

echo "{$teclado->describir()}\n";

class ProductoDigital extends Producto
{
    public function __construct(
        protected string $nombre,
        protected float $precio,
        protected int $stock,
    ) {
    }

    #[Override]
    public function describir(): string
    {
        return parent::describir() . " (a pedido)";
    }
}

$iphone = new ProductoDigital("iPhone 18 PRO Max", 5000, 150);

echo "{$iphone->describir()}\n";
