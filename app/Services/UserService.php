<?php

namespace App\Services;

use App\Models\User;
use App\DTO\UserDTO;
use App\Interfaces\IUserService;

class UserService implements IUserService {

    
    public function create(UserDTO $userDTO) : User
    {
        $user = User::create([
            'first_name' => $userDTO->first_name,
            'last_name' => $userDTO->last_name,
            'email' => $userDTO->email,
            'password' => $userDTO->email
        ]);

        return $user;
    }

    public function update(UserDTO $userDTO)
    {
        User::find($userDTO->id)->update([
            'first_name' => $userDTO->id,
            'last_name' => $userDTO->id,
            'email' => $userDTO->id
        ]);
        
        return response()->json(User::find($userDTO->id), 202);
    }

    public function delete(int $userId)
    {
        if(User::destroy($userId)) {
            return response()->json(['message' => 'User has been deleted.'], 204);
        }

        return response()->json(['error' => 'Unable to deelete user'], 409);
    }

}