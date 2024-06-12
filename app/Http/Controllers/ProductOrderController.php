<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductOrderController extends Controller
{
    public function index(): Response
    {
        return \response()->view('admin.product_orders.index');
    }

    public function detail(): Response
    {
        return \response()->view('admin.product_orders.details');
    }
}
