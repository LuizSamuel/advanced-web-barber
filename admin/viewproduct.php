<?php
// Include necessary files
require('./phpincludes/viewproduct.inc.php');
require('../admin/databases/db_connect.php');

// Pagination settings
$categoriesPerPage = isset($_GET['perPage']) ? $_GET['perPage'] : 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $categoriesPerPage;

// Sorting
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id'; // Default sorting by product ID
$sortOptions = array('id', 'name', 'cost'); // Define sortable fields
if (!in_array($sort, $sortOptions)) {
    $sort = 'id'; // If an invalid sorting option is provided, fallback to default
}
$query = "SELECT * FROM products ORDER BY $sort LIMIT $offset, $categoriesPerPage";

// Searching
$search = isset($_GET['search']) ? $_GET['search'] : '';
if (!empty($search)) {
    $search = $connection->real_escape_string($search);
    $query = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%' ORDER BY $sort LIMIT $offset, $categoriesPerPage";
}

// Fetch categories based on updated query
$result = $connection->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
</head>

<body style=" background: linear-gradient(to right, #33ccff 20%, #ff99cc 80%)">

    <div class=" container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success" role="alert">
                    Welcome, <?php echo $username; ?>!
                </div>
                <!-- <a href="add_product.php" class="btn btn-primary">Add Product</a>
                <a href="logout.php" class="btn btn-danger">Logout</a> -->
                <a href="welcome.php" class="btn btn-warning" style="border-radius: 3px; background-color: red; display: inline-block; padding: 1.5px 5px; text-decoration: none; color: white;">Back</a>
                <div style="padding-left: 70%; padding-top: -20px;">
                    <!-- Sorting Form -->
                    <form method="get" action="">
                        <label for="sort">Sort by:</label>
                        <select name="sort" id="sort">
                            <option value="id">Product ID</option>
                            <option value="name">Name</option>
                            <option value="cost">Cost</option>
                        </select>
                        <button type="submit">Sort</button>
                    </form>
                <!-- </div>
                <div style="padding-left: 70%;"> -->
                    <!-- Searching Form -->
                    <form method="get" action="">
                        <label for="search">Search:</label>
                        <input type="text" name="search" id="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button type="submit">Search</button>
                    </form>
                </div>

                <table class="table mt-3">
                    <thead style="background-color: #B2BEB5; width: 30%;">
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Cost</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #B2BEB5; width: 30%;">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Determine image source dynamically
                                $image_src = strpos($row["image_path"], './uploads/') === 0 ? $row["image_path"] : './admin/' . $row["image_path"];
                                echo '<tr style="background-color: white; width: 10%; text-align: center;">';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td style=" width: 30%;">' . $row['description'] . '</td>';
                                echo '<td>' . $row['cost'] . '</td>';
                                echo '<td><img src="' . $image_src . '" width="100" height="100"></td>';
                                echo '<td>
                                        <a href="./phpincludes/edit_productview.php?id=' . $row['id'] . '" class="btn btn-warning"  style="border-radius: 2px; background-color: blue; display: inline-block; padding: 1.5px 5px; text-decoration: none; color: white;">Edit</a>
                                        <a href="./phpincludes/delete_productview.inc.php?id=' . $row['id'] . '" class="btn btn-danger" style="border-radius: 2px; background-color: red; display: inline-block; padding: 1.5px 5px; text-decoration: none; color: white;" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a>
                                    </td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6">No products found</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                // Pagination buttons
                $prevPage = $page - 1;
                $nextPage = $page + 1;
                echo '<div  style=" padding-left: 90%;">';
                if ($prevPage > 0) {
                    echo '<a href="?page=' . $prevPage . '&perPage=' . $categoriesPerPage . '" class="btn btn"  style="padding-left: 10%; color: black;">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                            </svg>';
                    echo '</a>';
                }
                if ($result->num_rows == $categoriesPerPage) {
                    echo '<a href="?page=' . $nextPage . '&perPage=' . $categoriesPerPage . '" class="btn btn" style="padding-left: 10%; color: gold;">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-square-fill" viewBox="0 0 16 16">
                            <path d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1"/>
                            </svg>';
                    echo '</a>';
                }
                echo '</div>';
                ?>
            </div>
        </div>
    </div>

    <script>
        // Get the search input element
        const searchInput = document.getElementById('search');
        // Add an event listener for input event
        searchInput.addEventListener('input', function() {
            // Get the current value of the search input
            const searchValue = this.value.trim().toLowerCase();
            // Get all table rows
            const rows = document.querySelectorAll('tbody tr');
            // Loop through each row
            rows.forEach(row => {
                // Get the product name in current row
                const productName = row.querySelector('td:nth-child(2)').textContent.trim().toLowerCase();
                // Check if the product name contains the search value
                if (productName.startsWith(searchValue)) {
                    // If it does, show the row
                    row.style.display = '';
                } else {
                    // If it doesn't, hide the row
                    row.style.display = 'none';
                }
            });
        });
    </script>

</body>

</html>