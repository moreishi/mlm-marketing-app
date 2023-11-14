<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\DTO\RegisterDTO;

use App\Services\RegisterService;

class AuthController extends Controller
{

    public $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register(RegisterFormRequest $request)
    {
        $registerDTO = new RegisterDTO(
            $request->first_name,
            $request->last_name,
            $request->email,
            $request->password,
            $request->confirm_password
        );
        
        return $this->registerService->create($registerDTO);
    }

    public function login(Request $request)
    {
        return $request->all();
    }
}
