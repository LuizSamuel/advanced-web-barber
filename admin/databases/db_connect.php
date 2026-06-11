<?php
// Database connection parameters
$host = "localhost";
$user = "root";
$password = "";
$database = "favor";

// Create connection
$connection = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Make it accessible as $conn everywhere
$conn = $connection;
