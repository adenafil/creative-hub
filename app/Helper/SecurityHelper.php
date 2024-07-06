<?php

namespace App\Helper;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SecurityHelper {
    public static function encryptData($data, $key) {
        $method = 'AES-256-CBC';
        $ivLength = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encryptedData = openssl_encrypt($data, $method, $key, 0, $iv);

        if ($encryptedData === false) {
            Log::debug("Failed to encrypt data in security helper class");
            return redirect()->back();
        }

        Log::debug("enkripsi " . $encryptedData);
        $encryptedDataWithIv = base64_encode($iv . $encryptedData);
        Log::debug("enkripsi denga IV" . $encryptedDataWithIv);
        return $encryptedDataWithIv;
    }

    public static function decryptData($encryptedDataWithIv, $key) {
        $method = 'AES-256-CBC';
        $decodedData = base64_decode($encryptedDataWithIv);
        Log::debug("dekrip decode " . $decodedData);

        if ($decodedData === false) {
            Log::debug("Failed to decode base64 data in security helper class");
        }

        $ivLength = openssl_cipher_iv_length($method);
        $iv = substr($decodedData, 0, $ivLength);
        $encryptedData = substr($decodedData, $ivLength);
        $decryptedData = openssl_decrypt($encryptedData, $method, $key, 0, $iv);
        Log::debug("dekrip data iv " . $decryptedData);

        if ($decryptedData === false) {
            return redirect()->back();
        }

        return $decryptedData;
    }
}
