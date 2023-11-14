<?php

namespace App\Interfaces;

use App\DTO\RegisterDTO;

interface IRegisterService {

    public function create(RegisterDTO $registerDTO);

}