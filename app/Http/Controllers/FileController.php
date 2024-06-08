<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function viewFile($encoded): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $decoded = base64_decode($encoded);
            $path = storage_path("app/product/pictures/{$decoded}");

            if (!File::exists($path)) {
                return \response("File not found at path: $path", 404);
            }

            $file = File::get($path);
            $type = File::mimeType($path);

            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
        } catch (\Exception $e) {
            return response("Error decoding path: " . $e->getMessage(), 500);
        }
    }
}
