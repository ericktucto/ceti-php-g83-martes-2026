<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request)
    {
        $data = $request->validated();

        /** @var ?User $user */
        $user = User::where('email', $data['email'])->first();
        if (is_null($user)) {
            return $this->getResponseInvalidCredentials();
        }

        if (
            !Hash::check($data['password'], $user->password)
        ) {
            return $this->getResponseInvalidCredentials();
        }

        return response()->json([
            'token' => $user->createToken('api')->plainTextToken
        ]);
    }

    protected function getResponseInvalidCredentials()
    {
        return response()->json([
            'errors' => ['Credenciales invalidas'],
        ], 422);
    }
}
