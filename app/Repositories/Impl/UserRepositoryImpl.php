<?php

namespace App\Repositories\Impl;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepositoryImpl implements UserRepository
{
    public function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function attemptLogin(array $data): bool
    {
        $usernameOrEmail = filter_var($data['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return Auth::attempt([
            $usernameOrEmail => $data['username'],
            'password' => $data['password'],
        ]);
    }

}
