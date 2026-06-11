<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');
require_once 'admin/databases/db_connect.php';
?>
<h2>Saved Addresses</h2>
<!-- TODO: List and allow adding/editing/deleting delivery addresses -->
