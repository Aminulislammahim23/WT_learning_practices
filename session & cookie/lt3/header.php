<?php
session_start();

// -------- Page View Counter --------
if (!isset($_COOKIE['total_visits'])) {
    setcookie("total_visits", 1, time() + (86400 * 30));
    $totalVisits = 1;
} else {
    $totalVisits = $_COOKIE['total_visits'] + 1;
    setcookie("total_visits", $totalVisits, time() + (86400 * 30));
}

// -------- Unique Visitor --------
if (!isset($_COOKIE['first_visit'])) {
    setcookie("first_visit", date("Y-m-d H:i:s"), time() + (86400 * 365));
}

// -------- Last Visit --------
setcookie("last_visit", date("Y-m-d H:i:s"), time() + (86400 * 365));

// -------- Visit History (Last 5) --------
$visits = $_COOKIE['visit_history'] ?? [];
if (!is_array($visits)) {
    $visits = [];
}

$visits[] = time();
$visits = array_slice($visits, -5);

setcookie("visit_history", serialize($visits), time() + (86400 * 30));

// -------- Session Tracking --------
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
    $_SESSION['pages'] = [];
}

$currentPage = basename($_SERVER['PHP_SELF']);
if (!in_array($currentPage, $_SESSION['pages'])) {
    $_SESSION['pages'][] = $currentPage;
}
?>

<hr>
<nav>
    <a href="index.php">Home</a> |
    <a href="about.php">About</a> |
    <a href="services.php">Services</a> |
    <a href="contact.php">Contact</a> |
    <a href="clear.php">Clear History</a>
</nav>
<hr>
