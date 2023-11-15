<?php

namespace App\Services;

use App\Interfaces\ILoginService;
use App\DTO\LoginDTO;
use Illuminate\Support\Facades\Auth;

class LoginService implements ILoginService {

    public function login(LoginDTO $loginDTO) {

        $credentials = [
            'email' => $loginDTO->email,
            'password' => $loginDTO->password
        ];

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json([
            'user' => null,
            'access_token' => null,
            'token_type' => null,
            'error' => ['message' => 'Invalid login credentials']
        ], 401);

    }

}