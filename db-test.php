<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'favor';

$connTest = @mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if ($connTest) {
    echo 'Connected successfully to the MySQL database server running on local host';
    mysqli_close($connTest);
}
