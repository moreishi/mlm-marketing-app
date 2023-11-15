<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\DTO\RegisterDTO;
use App\DTO\LoginDTO;

use App\Services\RegisterService;
use App\Services\LoginService;


class AuthController extends Controller
{

    public $registerService;
    public $loginService;

    public function __construct(RegisterService $registerService, LoginService $loginService)
    {
        $this->registerService = $registerService;
        $this->loginService = $loginService;
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

    public function login(LoginFormRequest $request)
    {

        $loginDTO = new LoginDTO(
            $request->email,
            $request->password
        );

        return $this->loginService->login($loginDTO);
    }
}
