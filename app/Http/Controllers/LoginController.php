<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(): Response
    {
        return \response()
            ->view('auth.login', [
                'title' => 'Login Page'
            ]);
    }

    public function doLogin(LoginRequest $request): Response | RedirectResponse
    {

        if ($this->userService->login(data: $request->validated())) {
            Session::put('username', $request->input('username'));
            return redirect('/home');
        }

        return redirect()->route('login')->withErrors([
            'error' => 'username or password is wrong'
        ])->withInput();
    }
}
