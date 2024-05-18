<?php

namespace App\Services\Impl;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserServiceImpl implements UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    function login(array $data): bool
    {
        return $this->userRepository->attemptLogin($data);
    }

    public function register(array $data): User
    {
        return $this->userRepository->create($data);
    }
}
