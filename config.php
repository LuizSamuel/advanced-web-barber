<?php
// config.php
date_default_timezone_set('Africa/Nairobi');

// Base URL (no trailing slash)
define('BASE_URL', 'https://yourdomain.example');

// ----------------- Database (mysqli) -----------------
$db_host = 'localhost';
$db_user = 'db_user';
$db_pass = 'db_pass';
$db_name = 'db_name';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) die('DB connect error: ' . $conn->connect_error);

// ----------------- SMTP (PHPMailer) -----------------
define('SMTP_HOST', 'smtp.example.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'smtp_user@example.com');
define('SMTP_PASS', 'smtp_password');
define('MAIL_FROM', 'noreply@example.com');
define('MAIL_FROM_NAME', 'YourSite');

// ----------------- OAuth -----------------
define('GITHUB_CLIENT_ID', 'your_github_client_id');
define('GITHUB_CLIENT_SECRET', 'your_github_client_secret');
define('GITHUB_CALLBACK', BASE_URL . '/oauth/github-callback.php');

define('GOOGLE_CLIENT_ID', 'your_google_client_id');
define('GOOGLE_CLIENT_SECRET', 'your_google_client_secret');
define('GOOGLE_CALLBACK', BASE_URL . '/oauth/google-callback.php');

// Admin email(s) — used for notifications
$ADMIN_EMAILS = ['admin@example.com'];
