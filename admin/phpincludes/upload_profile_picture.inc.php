<?php
session_start();
require_once('../databases/db_connect.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Ensure the form was submitted via POST
// Check if a file is uploaded
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/';  // Directory to store uploaded images
    $fileName = basename($_FILES['profile_picture']['name']);
    $uploadFile = $uploadDir . $fileName;

    // Move the uploaded file to the designated directory
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
        // Update the admin's profile picture in the database
        $query = "UPDATE admins SET profile_picture = '$fileName' WHERE username = '$username'";
        if (mysqli_query($connection, $query)) {
            // Redirect back to the welcome page
            header("Location: ../welcome.php");
            exit();
        } else {
            echo "Error updating profile picture: " . mysqli_error($connection);
        }
    } else {
        echo "Failed to upload the file.";
    }
} else {
    echo "No file uploaded or there was an upload error.";
}
}

mysqli_close($connection);
