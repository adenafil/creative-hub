<?php

namespace App\Helper;

class SecurityHelper
{
    public static function encryptData($data, $key) {
        $method = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encryptedData = openssl_encrypt($data, $method, $key, 0, $iv);
        $encryptedDataWithIv = base64_encode($iv . $encryptedData);
        return $encryptedDataWithIv;
    }

    public static function decryptData($encryptedDataWithIv, $key) {
        $method = 'AES-256-CBC';
        $decodedData = base64_decode($encryptedDataWithIv);
        $ivLength = openssl_cipher_iv_length($method);
        $iv = substr($decodedData, 0, $ivLength);
        $encryptedData = substr($decodedData, $ivLength);
        $decryptedData = openssl_decrypt($encryptedData, $method, $key, 0, $iv);
        return $decryptedData;
    }


}
