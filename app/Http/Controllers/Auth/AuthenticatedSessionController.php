<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

//    public function store(Request $request)
//    {
//        $request->validate([
//            'login' => 'required|string',
//            'password' => 'required|string',
//        ]);
//
//        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
//
//        $credentials = [
//            $loginType => $request->login,
//            'password' => $request->password,
//        ];
//
//        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
//            throw ValidationException::withMessages([
//                'login' => __('auth.failed'),
//            ]);
//        }
//
//        $request->session()->regenerate();
//
//        return redirect()->intended(route('dashboard', absolute: false));
//    }
//
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
