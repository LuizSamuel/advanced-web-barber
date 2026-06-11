<?php
// Include database connection
require_once('../databases/db_connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the category ID and new name from the form
    $category_id = $_POST['category_id'];
    $new_category_name = $_POST['new_category_name'];

    // Prepare and execute the SQL statement to update the category name
    $sql = "UPDATE categories SET category_name='$new_category_name' WHERE id=$category_id";
    if ($connection->query($sql) === TRUE) {
        // Redirect back to the categories page after successful update
        header("Location: ../categories.php");
        exit();
    } else {
        // Display an error message if the update fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
