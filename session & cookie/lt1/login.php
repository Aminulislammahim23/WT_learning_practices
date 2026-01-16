<?php
    session_start();
    if (isset($_SESSION['username'])){
        header("Location: dashboard.php");
        exit();
    }

    $error_msg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

         // Hardcoded credentials
    if ($username === "admin" && $password === "admin123") {
        $_SESSION['username']   = $username;
        $_SESSION['login_time'] = date("Y-m-d H:i:s");
        $_SESSION['user_role']  = "Administrator";

        header("Location: dashboard.php");
        exit();
        } else {
            $error = "❌ Invalid username or password!";
        }
    }    
?>
<html>
<head>
</head>
<body>
    <?php
        if (isset($_SESSION['error_msg']))
             echo "<p style='color:red'>" . $_SESSION['error_msg'] . "</p>";
    ?>
    <form method="POST">
        <label>User Name :</label>
        <input type="text" name="username" id="username"><br><br>
        <label>Password :</label>
        <input type="password" name="password" id="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
