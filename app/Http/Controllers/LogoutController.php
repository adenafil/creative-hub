<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function doLogout(Request $request): RedirectResponse
    {
        $request->session()->forget('username');
        return redirect('/');
    }

}
