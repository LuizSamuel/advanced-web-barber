<?php
// Include database connection
require_once('../databases/db_connect.php');


// Fetch all categories from the database
$sql = "SELECT * FROM categories";
$result = $connection->query($sql);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the category name from the form
    $category_name = $_POST['category_name'];

    // Prepare and execute the SQL statement to insert the new category into the database
    $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    if ($connection->query($sql) === TRUE) {
        // Redirect back to the categories page after successful addition
        header("Location: ../categories.php");
        exit();
    } else {
        // Display an error message if the insertion fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
