<?php
// Start session
session_start();

if (isset($_POST['confirm_logout'])) {
    // Destroy session and redirect to login page
    session_destroy();
    header("Location: index.php");
    exit();
} elseif (isset($_POST['cancel_logout'])) {
    // Redirect back to welcome page
    header("Location: welcome.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Logout Confirmation</h2>
                <p class="text-center">Are you sure you want to logout?</p>
                <form action="" method="post" class="text-center">
                    <button type="submit" name="confirm_logout" class="btn btn-primary me-3">Continue</button>
                    <button type="submit" name="cancel_logout" class="btn btn-secondary">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>