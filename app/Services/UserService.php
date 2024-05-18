<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Models\User;

interface UserService
{
    function login(array $data): bool;

    function register(array $data): User;
}
