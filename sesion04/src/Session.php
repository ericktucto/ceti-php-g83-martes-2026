<?php

namespace App;

class Session
{
    private static ?Session $instancia = null;

    public function __construct(public string $nombre)
    {
    }

    public static function start(string $nombre)
    {
        if (self::$instancia instanceof Session) return self::$instancia;

        dump('Hola');

        return self::$instancia = new Session($nombre);
    }
}