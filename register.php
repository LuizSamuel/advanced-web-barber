<?php
session_start();
require_once 'admin/databases/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $redirectTo = $_POST['redirect_to'] ?? 'index.php';

    $name     = trim($_POST['name']);
    $email    = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $phone    = trim($_POST['phone']);
    $address  = trim($_POST['address'] ?? '');
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;

    if (!$name || !$email || !$password || !$address || !preg_match('/^(07|01)\d{8}$/', $phone)) {
        die('Invalid input.');
    }

    // Password policy validation
    $strongPassword = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password);

    if (!$strongPassword) {
        die("Password must include lowercase, uppercase, number, special character and be at least 8 characters.");
    }

    if ($password !== $confirm) {
        die("Passwords do not match.");
    }

    // Check existing email
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute(); $stmt->store_result();
    if ($stmt->num_rows > 0) die("Email already exists.");
    $stmt->close();

    // Profile picture upload
    $profile_pic = 'default.png';
    if (!empty($_FILES['profile_pic']['name'])) {
        $upload_dir = 'uploads/profile_pics/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

        $filename = uniqid() . '_' . basename($_FILES['profile_pic']['name']);
        $target = $upload_dir . $filename;

        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {
            $profile_pic = $filename;
        }
    }

    // Insert user
    $hashed = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (name,email,phone,address,profile_pic,password,newsletter) 
                            VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssi", $name, $email, $phone, $address, $profile_pic, $hashed, $newsletter);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        header("Location: $redirectTo"); exit();
    }
    $stmt->close();
} else {
    die("Invalid request.");
}
?>
