<?php

namespace App\Models;

class Producto
{
    public function __construct(
        public string $nombre,
        public float $precio,
        public ?int $id = null,
    ) {
    }

    public static function fromArray(array $datos)
    {
        return new Producto(
            $datos['nombre'],
            $datos['precio'],
            array_key_exists('id', $datos) ? (int) $datos['id'] : null,
        );
    }
}