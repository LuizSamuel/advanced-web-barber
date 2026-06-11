<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');
require_once 'admin/databases/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $stmt = $conn->prepare("UPDATE users SET name = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $phone, $_SESSION['user_id']);
    $stmt->execute();
    $stmt->close();
    echo "Profile updated!";
}
?>
<form method="post">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Phone: <input type="text" name="phone" required></label><br>
    <button type="submit">Save</button>
</form>
