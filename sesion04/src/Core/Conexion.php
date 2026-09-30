<?php

namespace App\Core;

use PDO;
use PDOException;

class Conexion
{
    private static ?PDO $instancia = null;
    private function __construct(
    ) {
    }

    public static function obtener(): PDO
    {
        if (self::$instancia instanceof PDO) return self::$instancia;

        return self::$instancia = self::crear();
    }

    private static function crear(): PDO
    {
        try {
            $dsn = 'pgsql:host=basededatos;port=5432;dbname=tienda';
            $user = 'erick';
            $password = '1234';

            return new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }
}
