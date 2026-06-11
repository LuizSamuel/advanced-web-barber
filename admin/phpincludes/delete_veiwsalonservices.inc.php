<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
require('../databases/db_connect.php');

// Check if product ID is provided in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Delete product from the database
    $sql = "DELETE FROM salonservices WHERE id = $product_id";

    if ($connection->query($sql) === TRUE) {
        // Reset IDs
        $sqlResetIds = "SET @num := 0;
                        UPDATE salonservices SET id = @num := (@num+1);
                        ALTER TABLE salonservices AUTO_INCREMENT = 1;";
        if ($connection->multi_query($sqlResetIds) === TRUE) {
            // Redirect to viewproduct.php after successful deletion
            header("Location: ../veiwsalonservices.php?delete=success");
            exit();
        } else {
            echo "Error updating IDs: " . $connection->error;
        }
    } else {
        // Display an error message if the deletion fails
        echo "Error deleting product: " . $connection->error;
    }
} else {
    // Redirect if product ID is not provided
    header("Location: ../veiwsalonservices.php");
    exit();
}
