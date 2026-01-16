<?php
session_start();

$cart = $_SESSION['cart'] ?? [];
$grandTotal = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>

<h2>🛒 Your Cart</h2>

<a href="products.php">⬅ Continue Shopping</a><br><br>

<?php if (empty($cart)): ?>
    <p>Cart is empty.</p>
<?php else: ?>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    <th>Action</th>
</tr>

<?php foreach ($cart as $item): 
    $subtotal = $item['price'] * $item['quantity'];
    $grandTotal += $subtotal;
?>
<tr>
    <td><?php echo $item['product_name']; ?></td>
    <td>৳<?php echo $item['price']; ?></td>
    <td>
        <form action="update_cart.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $item['product_id']; ?>">
            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
            <button type="submit">Update</button>
        </form>
    </td>
    <td>৳<?php echo $subtotal; ?></td>
    <td>
        <a href="remove_item.php?id=<?php echo $item['product_id']; ?>">Remove</a>
    </td>
</tr>
<?php endforeach; ?>

<tr>
    <td colspan="3"><b>Grand Total</b></td>
    <td colspan="2"><b>৳<?php echo $grandTotal; ?></b></td>
</tr>

</table>

<br>
<a href="empty_cart.php">🗑 Empty Cart</a>

<?php endif; ?>

</body>
</html>
