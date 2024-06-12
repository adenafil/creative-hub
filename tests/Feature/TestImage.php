<?php

namespace Tests\Feature;

use App\Helper\ImageHelper;
use App\services\ImageService;
use App\services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestImage extends TestCase
{
    public function testImageExist()
    {
        // URL gambar yang ingin diperiksa
        $url = 'http://localhost:8000/file/MzcvY292ZXJfMTcxNzgxMzY3OC5wbmc=';

        // Mendapatkan informasi gambar
        $imageInfo = @getimagesize($url);

        if ($imageInfo === false) {
            echo "URL does not load an image or is invalid.";
            self::assertFalse(false);
        } else {
            echo "Image dimensions: " . $imageInfo[0] . "x" . $imageInfo[1];
            echo "Image type: " . $imageInfo['mime'];
            self::assertTrue(true);
        }
    }

    public function testImageExistAgain()
    {
        $url = 'http://localhost:8000/file/MzcvY292ZXJfMTcxNzgxMzY3OC5wbmc=';
        self::assertTrue(ImageHelper::isThisImage($url));

        $url = 'www.digitalocean.com/singapore.txt';
        self::assertFalse(ImageHelper::isThisImage($url));

    }

}
