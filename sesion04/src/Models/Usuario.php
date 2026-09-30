<?php

namespace App\Models;

class Usuario
{
    public function __construct(
        public string $name,
        public string $username,
        public string $email,
        public ?int $id = null,
    ) {
    }

    public static function fromArray(array $datos)
    {
        return new Usuario(
            $datos['name'],
            $datos['username'],
            $datos['email'],
            array_key_exists('id', $datos) ? (int) $datos['id'] : null,
        );
    }
}