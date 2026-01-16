<?php include 'header.php'; ?>

<h2>📊 Blog Analytics Dashboard</h2>

<p><b>Total Visits:</b> <?php echo $totalVisits; ?></p>

<p><b>Session Duration:</b>
<?php
$duration = time() - $_SESSION['start_time'];
echo $duration . " seconds";
?>
</p>

<p><b>Pages Visited This Session:</b></p>
<ul>
<?php foreach ($_SESSION['pages'] as $page): ?>
    <li><?php echo $page; ?></li>
<?php endforeach; ?>
</ul>

<h3>👤 Visitor Statistics</h3>

<p><b>First Visit:</b> <?php echo $_COOKIE['first_visit'] ?? "N/A"; ?></p>
<p><b>Last Visit:</b> <?php echo $_COOKIE['last_visit'] ?? "N/A"; ?></p>

<?php
$history = isset($_COOKIE['visit_history']) ? unserialize($_COOKIE['visit_history']) : [];
$last24 = 0;

foreach ($history as $time) {
    if (time() - $time <= 86400) {
        $last24++;
    }
}
?>

<p><b>Visits in Last 24 Hours:</b> <?php echo $last24; ?></p>

<h3>🕒 Last 5 Visits</h3>
<ul>
<?php foreach ($history as $t): ?>
    <li><?php echo date("Y-m-d H:i:s", $t); ?></li>
<?php endforeach; ?>
</ul>
