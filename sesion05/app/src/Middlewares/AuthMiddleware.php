<?php

namespace App\Middlewares;

use App\Models\Usuario;
use App\Services\Contracts\JWTInterface;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\ConnectionResolverInterface;
use Override;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class AuthMiddleware implements MiddlewareInterface
{
    public function __construct(
        protected JWTInterface $jwt,
        protected ConnectionResolverInterface $resolver,
    ) {
        Usuario::setConnectionResolver($resolver);
    }

    #[Override]
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $headers = $request->getHeader('Authorization');
        if (count($headers) === 0) {
            return $this->getResponseUnauthorized();
        }
        $splitted = explode(' ', $headers[0]);
        if (count($splitted) !== 2) {
            return $this->getResponseUnauthorized();
        }

        $token = $splitted[1];

        try {
            if (!$this->jwt->verify($token)) {
                return $this->getResponseUnauthorized();
            }

            $decoded = $this->jwt->decode($token);

            /** @var ?Usuario $user */
            $user = Usuario::query()->find($decoded['data']->id);
            if (!$user) {
                return $this->getResponseUnauthorized();
            }
        } catch (\Exception $e) {
            return $this->getResponseUnauthorized();
        }

        return $handler->handle($request);
    }

    private function getResponseUnauthorized(): ResponseInterface
    {
        return new Response(401, [], json_encode(['message' => 'Unauthorized']));
    }
}
