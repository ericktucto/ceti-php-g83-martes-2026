<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Services\Contracts\JWTInterface;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\ConnectionResolverInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class AuthController
{
    public function __construct(
        ConnectionResolverInterface $resolver,
        private JWTInterface $jwt,
    ) {
        Usuario::setConnectionResolver($resolver);
    }

    public function login(ServerRequestInterface $request)
    {
        $body = $request->getBody()->getContents();
        $json = json_decode($body, true);

        $email = $json['email'];
        $password = $json['password'];

        $usuario = Usuario::query()->where('email', $email)->first();

        // is_null($usuario)
        // Guard
        if ($usuario === null) {
            return $this->getResponseInvalidCredentials();
        }

        $check = password_verify($password, $usuario->password);

        if (!$check) {
            return $this->getResponseInvalidCredentials();
        }

        return new Response(200, [], json_encode([
            'token' => $this->jwt->encode([
                'id' => $usuario->id,
            ]),
        ]));
    }

    private function getResponseInvalidCredentials(): ResponseInterface
    {
        return new Response(422, [], json_encode([
            'errors' => [
                'Las credenciales son invalidas',
            ]
        ]));
    }

    public function register(ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getBody()->getContents();
        $json = json_decode($body, true);

        $hashed_password = password_hash($json['password'], PASSWORD_ARGON2I);

        $usuario = new Usuario();
        $usuario->nombre = $json['nombre'];
        $usuario->email = $json['email'];
        $usuario->password = $hashed_password;
        $usuario->save();

        return new Response(201);
    }
}