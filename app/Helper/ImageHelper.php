<?php

namespace App\Helper;
use Illuminate\Support\Facades\Crypt;

class ImageHelper
{
    public static function isThisImage(string $url): bool
    {
        if (str_contains($url, 'gumroad'))
            return true;
        // Mendapatkan informasi gambar
        $imageInfo = @getimagesize($url);

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
