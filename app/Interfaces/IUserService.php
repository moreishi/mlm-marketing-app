<?php

namespace App\Interfaces;

use App\DTO\UserDTO;
use App\Models\User;


interface IUserService {
    
    public function create(UserDTO $userDTO) : User;

    public function update(UserDTO $userDTO) : User;

    public function delete(int $userId);

}