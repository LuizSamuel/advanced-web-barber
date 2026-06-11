<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <div class="container">
        <h1>Add Product</h1>
        <form action="./phpincludes/add_product.inc.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category">
                    <option selected disabled>Select a category</option>
                    <?php
                    // Include database connection
                    require('./databases/db_connect.php');

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
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="cost" class="form-label">Cost</label>
                <input type="number" class="form-control" id="cost" name="cost">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <a href="welcome.php" class="btn btn-warning" style="border-radius: 3px; background-color: silver; display: inline-block; padding: 1.5px 5px; text-decoration: none; color: black;">Cancel</a>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

</body>


</html>