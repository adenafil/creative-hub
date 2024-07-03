<?php

namespace App\services;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;

interface ProductService
{
    function addProduct(AddProductRequest $product);
    function getProductByUser(int $userId);
    function updateProduct(array $data, int $id): bool;
    function deleteProduct(string $idProduct, $dataRequest);
}
