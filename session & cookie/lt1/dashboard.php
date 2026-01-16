<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard</h2>

<p>✅ Welcome, <b><?php echo $_SESSION['username']; ?></b></p>
<p>🕒 Login Time: <?php echo $_SESSION['login_time']; ?></p>
<p>👤 Role: <?php echo $_SESSION['user_role']; ?></p>

<a href="profile.php">View Profile</a> |
<a href="logout.php">Logout</a>

</body>
</html>
