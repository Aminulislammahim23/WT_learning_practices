<?php
session_start();

$id = $_POST['id'];
$qty = $_POST['quantity'];

if ($qty > 0) {
    $_SESSION['cart'][$id]['quantity'] = $qty;
}

header("Location: cart.php");
exit();