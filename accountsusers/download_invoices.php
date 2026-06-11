<?php
session_start();
if (!isset($_SESSION['user_id'])) exit('Access denied');
// You'd normally generate or list PDF invoices here
?>
<h2>Download Invoices</h2>
<!-- TODO: List and link downloadable invoice files -->
