<?php

namespace App\Helper;
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
}
