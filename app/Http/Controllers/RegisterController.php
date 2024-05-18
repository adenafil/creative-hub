<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function doRegister(RegistrationRequest $request)
    {

        $user = $this->userService->register($request->validated());

        Auth::login($user);

        return redirect()->intended('/home');
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register Page',
        ]);
    }
}
