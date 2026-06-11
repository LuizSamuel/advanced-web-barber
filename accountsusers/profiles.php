<?php
session_start();
require_once '../admin/databases/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT name, email, phone, created_at FROM users WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $user_id);
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("No user found with ID $user_id");
}

$user = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body class="bg-light py-4">
<div class="container">
    <h2 class="mb-4">Welcome, <?= htmlspecialchars($user['name']) ?></h2>

    <div class="row">
        <!-- Profile Summary -->
        <div class="col-md-4 text-center">
            <img src="uploads/profile_pics/default.jpg" alt="Profile Picture" class="profile-img">
            <h5 class="mt-2"><?= htmlspecialchars($user['name']) ?></h5>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']) ?></p>
            <p><strong>Joined:</strong> <?= htmlspecialchars($user['created_at']) ?></p>
            <a href="../logout.php" class="btn btn-danger mt-2">Logout</a>
        </div>

        <!-- Profile Options -->
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-6">
                    <a href="edit_profile.php" class="btn btn-primary w-100">1. Edit Profile</a>
                </div>
                <div class="col-md-6">
                    <a href="order_history.php" class="btn btn-secondary w-100">2. Order / Booking History</a>
                </div>
                <div class="col-md-6">
                    <a href="manage_address.php" class="btn btn-outline-primary w-100">3. Saved Addresses</a>
                </div>
                <div class="col-md-6">
                    <a href="upload_profile_pic.php" class="btn btn-outline-info w-100">4. Upload Profile Picture</a>
                </div>
                <div class="col-md-6">
                    <a href="recent_activity.php" class="btn btn-outline-dark w-100">5. Recent Activity</a>
                </div>
                <div class="col-md-6">
                    <!-- Loyalty is not yet implemented -->
                    <a href="#" class="btn btn-outline-success w-100 disabled">6. Loyalty Points / Discounts (Coming Soon)</a>
                </div>
                <div class="col-md-6">
                    <a href="newsletter_status.php" class="btn btn-outline-warning w-100">7. Newsletter Subscription</a>
                </div>
                <div class="col-md-6">
                    <a href="security_settings.php" class="btn btn-outline-danger w-100">8. Security Settings</a>
                </div>
                <div class="col-md-6">
                    <a href="download_invoices.php" class="btn btn-outline-secondary w-100">9. Download Invoices</a>
                </div>
                <div class="col-md-6">
                    <a href="delete_account.php" class="btn btn-outline-danger w-100"
                       onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.')">
                        10. Delete My Account
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
