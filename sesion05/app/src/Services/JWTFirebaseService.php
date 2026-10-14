<?php

namespace App\Services;

use App\Services\Contracts\JWTInterface;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTFirebaseService implements JWTInterface
{
    public function __construct(
        private string $secret,
    ) {}

    public function encode(array $data): string
    {
        $payload = [
            'data' => $data,
            'iat' => time(),
            'exp' => time() + (15 * 3600),
        ];
        return JWT::encode($payload, $this->secret, 'HS256');
    }

    public function decode(string $token): array
    {
        $token = JWT::decode($token, new Key($this->secret, 'HS256'));
        return (array) $token;
    }

    public function verify(string $token): bool
    {
        try {
            return is_array($this->decode($token));
        } catch (Exception $e) {
            return false;
        }
    }
}
