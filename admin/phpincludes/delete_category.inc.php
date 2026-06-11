<?php
// Include database connection
require('../databases/db_connect.php');

// Check if category ID is provided in the URL
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Prepare and execute the SQL statement to delete the category
    $sql = "DELETE FROM categories WHERE id=$category_id";
    if ($connection->query($sql) === TRUE) {
        // Update IDs in the categories table after deletion
        $sqlUpdate = "SET @num := 0;
                    UPDATE categories SET id = @num := (@num+1);
                    ALTER TABLE categories AUTO_INCREMENT = 1;";
        if ($connection->multi_query($sqlUpdate) === TRUE) {
            // Redirect back to the categories page after successful deletion
            header("Location: ../categories.php");
            exit();
        } else {
            // Display an error message if updating IDs fails
            echo "Error updating IDs: " . $connection->error;
        }
    } else {
        // Display an error message if the deletion fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
} else {
    // Redirect if category ID is not provided
    header("Location: ../categories.php");
    exit();
}
