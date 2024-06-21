<?php

require_once __DIR__ . '../../connection/GetConnection.php';
require_once __DIR__ . '../../helper/getAllUsername.php';

$username = getUsername();

// ambil data json
$json = file_get_contents(__DIR__ . "../../data/number_bank.json");
// di decode dan juga menggunakna associative array
$data = json_decode($json, true);

// var_dump($data[0]);

$banks = [
    'dana',
    'ovo',
    'gopay',
    'shopeepay',
    'bri',
    'mandiri',
    'bni',
    'bca',
];


$sql = "
    insert into payment_methods(payment_account_recipient_name, payment_account_name, payment_account_number, user_id)
    values(?, ?, ?, ?)
";

foreach ($username as $key => $one) {
    // var_dump($data[$key]['payment_account_number']);
    $connection = getConnection();
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->execute([
        $one[1], $banks[rand(0, 7)], $data[$key]['payment_account_number'], $one[0]
    ]);
}

