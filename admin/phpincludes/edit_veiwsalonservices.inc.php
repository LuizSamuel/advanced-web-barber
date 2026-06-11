<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
require('.././databases/db_connect.php');

// Check if product ID is provided in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM salonservices WHERE id = $product_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Product details
        $name = $row['name'];
        $description = $row['description'];
        $cost = $row['cost'];
        $image_path = $row['image_path1'];
    } else {
        // Redirect if product not found
        header("Location: ../viewsalonservices.php");
        exit();
    }
} else {
    // Initialize variables for creating a new product
    $product_id = null;
    $name = "";
    $description = "";
    $cost = "";
    $image_path = "";
}

// Handle form submission for editing product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update product details
    $category = $_POST["category"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $cost = $_POST["cost"];

    // Update product in the database
    $sql = "UPDATE salonservices SET name='$name', description='$description', cost='$cost' WHERE id=$product_id";

    if ($connection->query($sql) === TRUE) {
        // Check if a new image is uploaded
        if ($_FILES['image']['size'] > 0) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);

            // Check file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowedTypes = array("jpg", "jpeg", "png", "gif");

            if (!in_array($imageFileType, $allowedTypes)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                exit();
            }

            // Upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Update image path in the database
                $sql = "UPDATE salonservices SET image_path1='$target_file' WHERE id=$product_id";

                if ($connection->query($sql) === TRUE) {
                    // Redirect to viewproduct.php after successful update
                    header("Location: ../veiwsalonservices.php");
                    exit();
                } else {
                    echo "Error updating image path in database: " . $connection->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Redirect to viewproduct.php after successful update
            header("Location: ../veiwsalonservices.php");
            exit();
        }
    } else {
        echo "Error updating product details: " . $connection->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Salon Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Edit Salon Services</h2>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category">
                            <option selected disabled>Select a category</option>
                            <?php
                            // Fetch all categories from the database
                            $sql = "SELECT * FROM categories";
                            $result = $connection->query($sql);

                            // Loop through categories fetched from the database and populate the dropdown
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["id"] . '">' . $row["category_name"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"><?php echo $description; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="text" class="form-control" id="cost" name="cost" value="<?php echo $cost; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" value="<?php echo $image_path; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="../veiwsalonservices.php" class="btn btn-warning" style="border-radius: 3px; background-color: silver; display: inline-block; padding: 1.5px 5px; text-decoration: none; color: black;">Cancel</a>
                    <!-- <a href="../viewproduct.php" class="btn btn-secondary">Cancel</a> -->
                </form>
            </div>
        </div>
    </div>

</body>

</html>