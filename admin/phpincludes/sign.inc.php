<?php
session_start();

require_once '../databases/db_connect.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header("Location: ../index.php");
    exit();
}

$stmt = mysqli_prepare(
    $connection,
    "SELECT id, username, email, password FROM admins WHERE username = ? OR email = ? LIMIT 1"
);

if (!$stmt) {
    header("Location: ../index.php");
    exit();
}

mysqli_stmt_bind_param($stmt, "ss", $username, $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$admin = $result ? mysqli_fetch_assoc($result) : null;

if ($admin && password_verify($password, $admin['password'])) {
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['username'] = $admin['username'];
    $_SESSION['admin_email'] = $admin['email'];

    header("Location: ../welcome.php");
    exit();
}

header("Location: ../index.php");
exit();
