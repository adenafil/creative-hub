<?php

function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $database = "creative_hub";
    $username = "root";
    $password = "";

    return new PDO(
        "mysql:host=$host:$port;dbname=$database",
        $username,
        $password
    );
}