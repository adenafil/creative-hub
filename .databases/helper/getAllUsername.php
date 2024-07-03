<?php


require_once __DIR__ . '../../connection/getConnection.php';



function getUsername() {
    $username = [];
    $connection = getConnection();
    $sql = "select id, username from users";
    $preparedStatementUser = $connection->prepare($sql);
    $preparedStatementUser->execute();    

    foreach ($preparedStatementUser as $key => $value) {
        $username[] = [
            $value['id'],
            $value['username'],
        ];
    };

    return $username;
}

// var_dump(getUsername());
