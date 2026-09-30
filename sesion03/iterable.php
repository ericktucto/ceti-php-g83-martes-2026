<?php declare(strict_types=1);

class Producto
{
    public function __construct(
        public string $nombre,
        public float $precio,
    ) {
    }
}

class Carrito implements Iterator
{
    private int $position = 0;
    private array $items = [];

    public function agregar(Producto $producto): void
    {
        $this->items[] = $producto;
    }

    public function vaciar(): void
    {
        $this->items = [];
    }

    public function current(): Producto
    {
        echo "current\n";
        return $this->items[$this->position];
    }

    public function valid(): bool
    {
        echo "valid\n";
        return isset($this->items[$this->position]);
    }
    
    public function next(): void
    {
        echo "next\n";
        ++$this->position;
        //$this->position = $this->position + 1;
    }

    public function rewind(): void
    {
        echo "rewind\n";
        $this->position = 0;
    }

    public function key(): int
    {
        echo "key\n";
        return $this->position;
    }
}

$carrito = new Carrito();
$carrito->agregar(
    new Producto("iPhone 18 PRO", 5000)
);
$carrito->agregar(
    new Producto("iPad Mini", 3000),
);
/*
$carrito2 = [];
$carrito2[] = new Producto("iPhone 18 PRO", 5000);
$carrito2[] = "no soy un producto";
*/

foreach ($carrito as $key => $producto) {
    echo $producto->nombre . "\n";
}
echo "------\n";
foreach ($carrito as $key => $producto) {
    echo $producto->precio . "\n";
}