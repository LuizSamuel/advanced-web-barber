<?php
session_start();
require_once 'admin/databases/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $redirectTo = isset($_POST['redirect_to']) ? $_POST['redirect_to'] : 'index.php';

    if (!$email || !$password) {
        die("Please fill in both fields.");
    }

    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $user_name, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['user_id']   = $user_id;
            $_SESSION['user_name'] = $user_name;
            setcookie("last_user_name", $user_name, time() + (86400 * 30), "/");
            setcookie("last_login_date", date('Y-m-d'), time() + 86400, "/");

            // Redirect back to original page or fallback
            header("Location: $redirectTo");
            exit();
        } else {
            die("Invalid email or password.");
        }
    } else {
        die("Invalid email or password.");
    }
}
?>
