<?php

require_once __DIR__ . '../../../../connection/GetConnection.php';
require_once __DIR__ . '../../user_mocking.php';
require_once __DIR__ . '/helper/user.php';
require_once __DIR__ . '../../../../reviews/api/dummy_comment_api.php';
require_once __DIR__ . "../../../../data/comment.php";

$connection = getConnection();

$sql = "
    insert into users(name, username, email, password)
    values(?, ?, ?, ?)
";

// var_dump($decode_data[0]['username']);

foreach ($decode_data as $key => $value) {
    // var_dump($value['username']);
    $preparedStatement = $connection->prepare($sql);
    $preparedStatement->execute([
        $value['username'],
        $value['username'],
        $value['username'] . "@gmail.com",
        $value['username'] . "123"
    ]);
}

$sql_user_details = "
    insert into user_details(user_id, bio, title, image_url)
    values(?, ?, ?, ?)
";

$id = 570;
$index_data = 0;
for ($i = 570; $i < 1069; $i++) {
    $bio = "hi, i'm " . $decode_data[$index_data]['username'] ;
    $title = 'unemployed';
    $location = "https://www.aurelio.ai/_next/image?url=%2Fimages%2Fpeople%2Fplaceholder.png&w=640&q=100";

    $preparedStatement = $connection->prepare($sql_user_details);
    $preparedStatement->execute([
        $i,
        $bio,
        $title,
        $location,
    ]);
    $index_data++;
}

//$sql_for_carts_table = "
//    insert into carts(user_id)
//    values(?)
//";
//
//$temp_user_id_cart = 570;
//for ($i = 1; $i <= 500; $i++) {
//    $preparedStatement = $connection->prepare($sql_for_carts_table);
//    $preparedStatement->execute([
//        $temp_user_id_cart,
//    ]);
//    $temp_user_id_cart++;
//
//}

// carts_product

$sql_cart_products = "
    insert into table_users_addcarts_products(user_id, product_id)
    values(?, ?)
";

$temp_product_id = 1;

$cart_id = 570;
for ($i = 1; $i <= 1000; $i++) {
    $preparedStatement = $connection->prepare($sql_cart_products);
    $preparedStatement->execute([
        $cart_id,
        $i,
    ]);
    if ($cart_id == 1069) {
        $cart_id = 570;
    }
    $cart_id++;

}


// user_payments
$sql_user_payments = "
    insert into user_payments(user_id, payment_method_id, payment_proof_url, status)
    values(?, ?, ?, ?)
";

$payment_method_id = 1;
for ($i = 570; $i <= 1069; $i++) {
    $preparedStatement = $connection->prepare($sql_user_payments);
    $preparedStatement->execute([
        $i,
        $payment_method_id,
        'https://i.pinimg.com/236x/ba/2b/31/ba2b31f1b19d988fe463d3f320b8b14a.jpg',
        'paid'
    ]);
    $payment_method_id++;
}

$payment_method_id = 1;
for ($i = 570; $i <= 1069; $i++) {
    $preparedStatement = $connection->prepare($sql_user_payments);
    $preparedStatement->execute([
        $i,
        $payment_method_id,
        'https://i.pinimg.com/236x/ba/2b/31/ba2b31f1b19d988fe463d3f320b8b14a.jpg',
        'paid'
    ]);
    $payment_method_id++;
}


// transactions
$sql_transaction = "
    insert into transactions(user_id, user_payment_id)
    values(?, ?)
";

$user_payment_id = 1;
for ($i = 570; $i <= 1069; $i++) {
    $preparedStatement = $connection->prepare($sql_transaction);
    $preparedStatement->execute([
        $i,
        $user_payment_id,
    ]);
    $user_payment_id++;
}

for ($i = 570; $i <= 1069; $i++) {
    $preparedStatement = $connection->prepare($sql_transaction);
    $preparedStatement->execute([
        $i,
        $user_payment_id,
    ]);
    $user_payment_id++;
}



// transaction
$sql_purchases = "
    insert into purchases(transaction_id, product_id)
    values(?, ?)
";

for ($i = 1; $i <= 1000; $i++) {
        $preparedStatement = $connection->prepare($sql_purchases);
        $preparedStatement->execute([
            $i,
            $i,
        ]);
}

$sql_reviews = "
insert into reviews(star, comments, user_id, product_id)
values(?, ?, ?, ?)
";


$user_id_for_reviews = 570;
for ($i = 1; $i < 1000; $i++) {
    $preparedStatement = $connection->prepare($sql_reviews);
    $preparedStatement->execute([
        rand(1, 5),
        $comments[rand(0, 91)],
        $user_id_for_reviews,
        $i,
    ]);
    $user_id_for_reviews++;

    if ($user_id_for_reviews == 1069) {
        $user_id_for_reviews = 570;

    }
}
