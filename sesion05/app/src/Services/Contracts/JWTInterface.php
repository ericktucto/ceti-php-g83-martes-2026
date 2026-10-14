<?php

namespace App\Services\Contracts;

interface JWTInterface
{
    public function encode(array $data): string;

    public function decode(string $token): array;

    public function verify(string $token): bool;
}
