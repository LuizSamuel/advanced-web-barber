<?php
session_start(); // Start the session to access user data
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists(__DIR__ . '/../databases/db_connect.php')) {
    require_once(__DIR__ . '/../databases/db_connect.php');
} else {
    echo "Database connection file not found!";
    exit; // Stop the script here
}

require_once('../databases/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$targetDir = "../uploads";
if (!file_exists($targetDir)) {
mkdir($targetDir, 0755, true);
}

$fileName = basename($_FILES["profileIcon"]["name"]);
$targetFilePath = $targetDir . uniqid() . '-' . $fileName;

$check = getimagesize($_FILES["profileIcon"]["tmp_name"]);
if ($check === false) {
echo "File is not an image.";
exit;
}

if (move_uploaded_file($_FILES["profileIcon"]["tmp_name"], $targetFilePath)) {
// Use session variables to store user info (assuming they are set during login)
$username = $_SESSION['username'];
$email = $_SESSION['email'];

// Save to database
$sql = "UPDATE users SET profile_icon = '$targetFilePath' WHERE username = '$username'";

if ($connection->query($sql) === TRUE) {
echo "Profile icon uploaded and saved successfully!";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
} else {
echo "Sorry, there was an error uploading your file.";
}
}

$connection->close();