<?php

namespace App\Services;

use App\DTO\RegisterDTO;
use App\Interfaces\IRegisterService;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService implements IRegisterService {

    public function create(RegisterDTO $registerDTO)
    {
        
        $user = User::create([
            'first_name' => $registerDTO->first_name,
            'last_name' => $registerDTO->last_name,
            'email' => $registerDTO->email,
            'password' => Hash::make($registerDTO->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

    }

}