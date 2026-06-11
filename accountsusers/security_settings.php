<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');
// You can include options like change password, 2FA, etc.
?>
<h2>Security Settings</h2>
<p><a href="change_password.php">Change Password</a></p>
<!-- TODO: Add more security options like 2FA -->
