<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_pic'])) {
    $target = "uploads/" . basename($_FILES['profile_pic']['name']);
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
    echo "Uploaded successfully!";
}
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="profile_pic" required>
    <button type="submit">Upload</button>
</form>
