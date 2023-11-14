<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Services\UserService;
use App\DTO\UserDTO;
use App\Http\Requests\UserCreateRequest;



class UserController extends Controller
{

    public $userRepository;

    public $userService;

    public function __construct(
        UserRepository $userRepository, 
        UserService $userService)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->userRepository->findAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $userDTO = new UserDTO();
        return $this->userService->create($userDTO);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->userRepository->findById($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userDTO = new UserDTO();
        $userDTO->id = $id;

        return $this->userService->update($userDTO);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->userService->delete($id);
    }
}
