<?php
date_default_timezone_set('Africa/Nairobi');

$greeting = "";
$hour = (int)date('H');

if ($hour >= 5 && $hour < 12) {
    $greeting = "Good morning";
} elseif ($hour >= 12 && $hour < 17) {
    $greeting = "Good afternoon";
} elseif ($hour >= 17 && $hour < 21) {
    $greeting = "Good evening";
} else {
    $greeting = "Good night";
}


if (isset($_SESSION['user_name'])) {
    $name = $_SESSION['user_name'];

    if (isset($_SESSION['just_logged_in'])) {
        echo "<div class='ms-3 me-auto d-flex align-items-center'>
            <span class='text-success fw-bold'>Welcome back, " . htmlspecialchars($name) . "</span>
        </div>";
        unset($_SESSION['just_logged_in']); // only show once
    } else {
        echo "<div class='ms-3 me-auto d-flex align-items-center'>
            <span class='text-warning fw-bold'>{$greeting}, " . htmlspecialchars($name) . "</span>
        </div>";
    }
}
?>
