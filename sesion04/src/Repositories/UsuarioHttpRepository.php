<?php

namespace App\Repositories;

use App\Models\Usuario;
use GuzzleHttp\Client;
use Override;

class UsuarioHttpRepository implements IUsuarioRepository
{
    public function __construct(
        //private HttpClient $client,
    ) {
    }

    #[Override]
    public function todos(): array
    {
        $client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com']);

        $response = $client->request('GET', '/users');
        $datos = json_decode($response->getBody()->getContents(), true);
        return array_map(fn($item) => Usuario::fromArray($item), $datos);
    }
}
