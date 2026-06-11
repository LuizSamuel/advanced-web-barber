<?php
session_start();
session_unset();
session_destroy();

// Do not unset the 'last_user_name' cookie
header("Location: index.php");
exit();
