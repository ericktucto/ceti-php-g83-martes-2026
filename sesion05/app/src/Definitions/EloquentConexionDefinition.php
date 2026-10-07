<?php

namespace App\Definitions;

use Illuminate\Database\Connection;
use Illuminate\Database\ConnectionResolver;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Database\PostgresConnection;
use InvalidArgumentException;
use PDO;
use Psr\Container\ContainerInterface;

class EloquentConexionDefinition
{
    public function create(ContainerInterface $container): ConnectionResolverInterface
    {
        // configuracion de mis conexiones
        $databases = $container->get('config_database');

        $connections = static::createConnections($databases);

        $resolver = new ConnectionResolver($connections);
        $resolver->setDefaultConnection(static::getDefaultNameConnection($databases));

        return $resolver;
    }

    protected static function getDefaultNameConnection(array $databases): string
    {
        if (array_key_exists('default', $databases)) {
            return $databases['default'];
        }
        $names = array_keys($databases);
        $filtered = array_values(array_filter($names, fn($name) => $name !== 'default'));

        if ($filtered === []) {
            throw new InvalidArgumentException("Don't have configured database in 'databases' key");
        }

        return $filtered[0];
    }

    protected static function createConnections(array $databases)/*, Dispatcher $dispatcher*/ : array
    {
        $connections = [];
        foreach ($databases as $connName => $configDb) {
            // continue if is default
            if ($connName === 'default') {
                continue;
            }

            $driver = $configDb['driver'];

            $conn = match ($driver) {
                'pgsql' => static::buildPostgresConnection($configDb),
                default => throw new InvalidArgumentException(
                    "Driver {$driver} not supported in '{$connName}' connection.",
                ),
            };

            $connections[$connName] = $conn;
        }

        return $connections;
    }

    protected static function buildPostgresConnection(array $config): Connection
    {
        $host = $config['host'];
        $dbname = $config['dbname'];
        $dsn = "pgsql:host={$host};port=5432;dbname={$dbname}";
        $user = $config['user'];
        $password = $config['password'];
        $pdo = fn() => new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        return new PostgresConnection($pdo, $dbname);
    }
}
