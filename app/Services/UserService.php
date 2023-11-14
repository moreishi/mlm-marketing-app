<?php

namespace App\Services;

use App\Models\User;
use App\DTO\UserDTO;
use App\Interfaces\IUserService;

class UserService implements IUserService {

    
    public function create(UserDTO $userDTO) : User
    {
        $user = new User([
            'name' => $userDTO->name,
            'email' => $userDTO->email
        ]);

        return $user;
    }

    public function update(UserDTO $userDTO) : User
    {
        $user = User::find($userDTO->id)->update([
            'name' => $userDTO->id,
            'email' => $userDTO->id
        ]);

        return $user;
    }

    public function delete(int $userId)
    {
        return User::deleted($userId);
    }

}