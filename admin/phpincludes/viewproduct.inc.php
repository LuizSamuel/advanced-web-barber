<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

// Retrieve username from session
$username = $_SESSION['username'];

// Include database connection
require('./databases/db_connect.php');

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $connection->query($sql);
// Close the database connection
$connection->close();
