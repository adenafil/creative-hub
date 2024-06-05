<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function dashboard(): Response
    {
        return \response()->view('admin.dashboard');
    }


}
