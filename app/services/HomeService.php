<?php

namespace App\services;

use Illuminate\Http\Request;

interface HomeService
{
    function getDataProductOnIndex(int $length, Request $request): array;
    function getDataDetailProduct(int $id): array;
    function checkout($data, $id);
}
