<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');
require_once 'admin/databases/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subscribed = isset($_POST['subscribe']) ? 1 : 0;
    $stmt = $conn->prepare("UPDATE users SET newsletter = ? WHERE id = ?");
    $stmt->bind_param("ii", $subscribed, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->close();
}

$stmt = $conn->prepare("SELECT newsletter FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($newsletter);
$stmt->fetch();
$stmt->close();
?>
<form method="post">
    <label>
        <input type="checkbox" name="subscribe" <?= $newsletter ? 'checked' : '' ?>>
        Subscribe to Newsletter
    </label>
    <button type="submit">Update</button>
</form>
