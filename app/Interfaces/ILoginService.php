<?php

namespace App\Interfaces;

use App\DTO\LoginDTO;

interface ILoginService {

    public function login(LoginDTO $loginDTO);

}