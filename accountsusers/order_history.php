<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');
require_once 'admin/databases/db_connect.php';
?>
<h2>Your Order History</h2>
<!-- TODO: Fetch and display user's past orders -->
