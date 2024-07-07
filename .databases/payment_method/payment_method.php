<?php

require_once __DIR__ . '../../connection/GetConnection.php';
require_once __DIR__ . '../../helper/getAllUsername.php';

$username = getUsername();

// Ambil data json
$json = file_get_contents(__DIR__ . "../../data/number_bank.json");
// Decode dan gunakan associative array
$data = json_decode($json, true);

$banks = [
    'dana',
    'ovo',
    'gopay',
    'shopeepay',
    'bri',
    'mandiri',
    'bni',
    'bca',
    'BTC',
    'SIDOLAR',
    'SIDOMPUL',
    'SIMANTAP',
    'X-Ray',
    'SingBox',
    'Meta',
    'Hansen'
];

$random = [
    123,
    456,
    923,
    232,
    231,
    111,
];

$sql = "
    insert into payment_methods(payment_account_recipient_name, payment_account_name, payment_account_number, user_id)
    values(?, ?, ?, ?)
";

foreach ($username as $key => $one) {
    try {
        $connection = getConnection();
        $preparedStatement = $connection->prepare($sql);
        $preparedStatement->execute([
            $one[1],
            $banks[rand(0, count($banks) - 1)],
            $data[$key]['payment_account_number'] . $random[rand(0, count($random) - 1)],
            $one[0]
        ]);
        // Tutup koneksi setiap kali setelah digunakan
        $preparedStatement = null;
        $connection = null;
    } catch (PDOException $e) {
        // Jika terjadi error, tangkap dan tampilkan pesan error
        echo "Error: " . $e->getMessage();
    }
}
?>
