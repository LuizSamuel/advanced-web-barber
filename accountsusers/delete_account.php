<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');
require_once 'admin/databases/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $stmt->close();
    session_destroy();
    echo "Account deleted.";
    exit;
}
?>
<form method="post" onsubmit="return confirm('Are you sure you want to delete your account?');">
    <button type="submit" class="btn btn-danger">Delete My Account</button>
</form>
