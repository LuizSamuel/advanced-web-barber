<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');
// You can log and show recent actions like orders, logins, etc.
?>
<h2>Recent Activity</h2>
<!-- TODO: Display user-specific activity log -->
