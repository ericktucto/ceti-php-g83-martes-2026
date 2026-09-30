<?php

namespace Erick\Tienda\Modelos;

class Producto
{
    public function __construct(
        public string $nombre,
        public float $precio,
    ) {
    }
}