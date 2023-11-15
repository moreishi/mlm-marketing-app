<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\IUserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements IUserRepository {

    public function findAll() : Collection
    {
        return User::all();
    }

    public function findById(int $userId) : User
    {
        return User::find($userId);
    }

}