<?php

$user_data = file_get_contents(__DIR__ . "../../../data/username.json");
$decode_data = json_decode($user_data, true);

var_dump($decode_data[0]['username']);


$number_data = file_get_contents(__DIR__ . "../../../data/number.json");
$decode_number = json_decode($number_data, true);




