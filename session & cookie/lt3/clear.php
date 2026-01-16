<?php
session_start();

// Clear session
session_unset();
session_destroy();

// Clear cookies
setcookie("total_visits", "", time() - 3600);
setcookie("first_visit", "", time() - 3600);
setcookie("last_visit", "", time() - 3600);
setcookie("visit_history", "", time() - 3600);

header("Location: index.php");
exit();
