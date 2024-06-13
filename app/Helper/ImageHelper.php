<?php

namespace App\Helper;
use Illuminate\Support\Facades\Crypt;

class ImageHelper
{
    public static function isThisImage(string $url): bool
    {
        if (substr($url, 0, strlen("https://public-files.gumroad.com/")) === "https://public-files.gumroad.com/")
            return true;
        // Mendapatkan informasi gambar
        $imageInfo = @getimagesize($url);

//        if ($imageInfo === false) {
//            echo "URL does not load an image or is invalid.";
//            self::assertFalse(false);
//        } else {
//            echo "Image dimensions: " . $imageInfo[0] . "x" . $imageInfo[1];
//            echo "Image type: " . $imageInfo['mime'];
//            self::assertTrue(true);
//        }
        return !($imageInfo === false);

    }

    public static function encodePath($path)
    {
        return Crypt::encryptString($path);
    }

    public static function decodePath($encoded)
    {
        try {
            return Crypt::decryptString($encoded);
        } catch (\Exception $e) {
            return null; // Handle decryption error
        }
    }

}
