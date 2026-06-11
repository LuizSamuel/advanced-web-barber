<!-- categories.php -->

<?php
// Include database connection
require('./databases/db_connect.php');

// Fetch all categories from the database
$sql = "SELECT * FROM categories";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>

<body style="background-color: #B2BEB5;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6"> <!--style="width:auto"-->
                <h2>Categories</h2>
                <!-- Display categories -->
                <ul class="list-group">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="list-group-item">' .
                                '<span class="category-name">' . $row["category_name"] . '</span>' .


                                '<form class="edit-form d-none" method="post" action="./phpincludes/edit_category.inc.php">' .
                                '<input type="hidden" name="category_id" value="' . $row["id"] . '">' .
                                '<input type="text" class="form-control" name="new_category_name" value="' . $row["category_name"] . '">' .
                                '<button type="submit" class="btn btn-success col-auto btn-sm mx-2" style="margin-top: 15px;">Save</button>' .
                                '</form>' .

                                '<div class="col-auto" style="margin-top: -30px; padding-left: 150px;">' .
                                '<button class="btn btn-primary btn-sm mx-2 edit-btn">Edit</button>' .
                                '<a href="./phpincludes/delete_category.inc.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm">Delete</a>' .
                                '</div>' .
                                '</li>';
                        }
                    } else {
                        echo '<li class="list-group-item">No categories found</li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-6">
                <!-- Add new category form -->
                <h2>Add Category</h2>
                <form method="post" action="./phpincludes/add_category.inc.php">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="category_name" placeholder="Enter category name">
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                    <a href="welcome.php" class="btn btn-danger" style="margin-left: 80px">Back</a>' .
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                var listItem = $(this).closest('li');
                var categoryName = listItem.find('.category-name').text();
                var editForm = listItem.find('.edit-form');
                var editInput = editForm.find('input[name="new_category_name"]');

                editInput.val(categoryName);
                listItem.find('.category-name').hide();
                editForm.removeClass('d-none');
            });
        });
    </script>
</body>

</html>