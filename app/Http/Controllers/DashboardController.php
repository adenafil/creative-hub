<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function home(): Response
    {
        return \response()->view('user.dashboard.home', [
            'title' => 'Dashboard Home Page',
            'username' => User::first()->username,
        ]);
    }
}
