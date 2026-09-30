<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$dsn = 'pgsql:host=basededatos;port=5432;dbname=tienda';
$user = 'erick';
$password = '1234';

$con = new PDO($dsn, $user, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

dd($con);


