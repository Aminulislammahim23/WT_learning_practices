<?php
session_start();

// Item count
$itemCount = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $itemCount += $item['quantity'];
    }
}

// Product list
$products = [
    1 => ["name"=>"Laptop", "price"=>75000],
    2 => ["name"=>"Smartphone", "price"=>35000],
    3 => ["name"=>"Headphones", "price"=>5000],
    4 => ["name"=>"Smart Watch", "price"=>8000],
    5 => ["name"=>"Keyboard", "price"=>2500],
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h2>🛍 Electronics Store</h2>
<p>🛒 Cart Items: <b><?php echo $itemCount; ?></b> |
<a href="cart.php">View Cart</a></p>

<hr>

<?php foreach ($products as $id => $product): ?>
    <div style="border:1px solid #ccc; padding:10px; width:250px; margin:10px; display:inline-block;">
        <img src="https://via.placeholder.com/150"><br>
        <b><?php echo $product['name']; ?></b><br>
        Price: ৳<?php echo $product['price']; ?><br><br>

        <form method="POST" action="add_to_cart.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
            <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
<?php endforeach; ?>

</body>
</html>