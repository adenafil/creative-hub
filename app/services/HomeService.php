<?php

namespace App\services;

interface HomeService
{
    function getDataProductOnIndex(int $length): array;

    function getDataDetailProduct(int $id): array;
    function checkout($data, $id);
}
