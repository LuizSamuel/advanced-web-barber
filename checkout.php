<?php
session_start(); // Make sure session is started

if (!isset($_SESSION['user_id'])) {
    $showAuthModal = true; // Trigger login/register modal
} else {
    $showAuthModal = false;
}

$amount = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['total'])) {
    $amount = filter_var($_POST['total'], FILTER_VALIDATE_FLOAT);
    if (!$amount) {
        die('Invalid amount details provided. Please try again.');
    }
}

$name = $email = $phone = '';
if (!$showAuthModal) {
    require_once 'admin/databases/db_connect.php';
    $stmt = $conn->prepare("SELECT name, email, phone FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $stmt->bind_result($name, $email, $phone);
    $stmt->fetch();
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
<?php if ($showAuthModal): ?>
<script>
    window.addEventListener('load', function () {
        const modal = new bootstrap.Modal(document.getElementById('authModal'));
        modal.show();
    });
</script>
<?php endif; ?>

    <div class="container mt-5">
        <form action="stkpush.php" method="POST">
            <div class="mb-3">
                <label for="customer_name">Customer Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" 
                value="<?= htmlspecialchars($name) ?>" placeholder="Customer Name" required>
            </div>
            <div class="mb-3">
                <label for="customer_phone">Phone Number</label>
                <input type="text" class="form-control" id="customer_phone" name="customer_phone" 
                value="<?= htmlspecialchars($phone) ?>" placeholder="07/01xxxxxxxx" required>
            </div>
            <div class="mb-3">
                <label for="customer_email">Email</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" 
                value="<?= htmlspecialchars($email) ?>" placeholder="Customer Email" required>
            </div>
            <div class="mb-3">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $amount; ?>" readonly>
            </div>
            <button type="submit" name="stkpush.php" class="btn btn-primary">Proceed with Payment</button>
        </form>
    </div>
       
<?php include 'partials/login-register-modal.php'; ?>

</body>
</html>
