<?php declare(strict_types=1);

use App\Repositories\UsuarioHttpRepository;

require __DIR__ . '/../vendor/autoload.php';

$repo = new UsuarioHttpRepository();

dd($repo->todos());
