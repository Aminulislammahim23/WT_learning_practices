<?php
session_start();

$id    = $_POST['id'];
$name  = $_POST['name'];
$price = $_POST['price'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Duplicate item handling
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] += 1;
} else {
    $_SESSION['cart'][$id] = [
        "product_id" => $id,
        "product_name" => $name,
        "price" => $price,
        "quantity" => 1
    ];
}

header("Location: products.php");
exit();
