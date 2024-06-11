<?php

namespace App\services;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;

interface ProductService
{
    function getDataHome(int $length);
    function addProduct(AddProductRequest $product);
    function downloadProduct();
    function getProductByUser(int $userId);
    function updateProduct(array $data, int $id): bool;
    function deleteProduct(string $idProduct, $dataRequest);
    function getProductDataOnHome(int $id): array;
}
