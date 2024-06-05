<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    public function index(): Response
    {
        return \response()->view('admin.transactions.index');
    }

    public function detail(): Response
    {
        return \response()->view('admin.transactions.details');
    }

}
