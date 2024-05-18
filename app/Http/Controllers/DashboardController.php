<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function home(Request $request): Response
    {
        $user = User::query()->where('username', '=' ,Session::get('username'))->first();

        return \response()->view('user.dashboard.home', [
            'title' => 'Dashboard Home Page',
            'username' => $user->username,
        ]);
    }
}
