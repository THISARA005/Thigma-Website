<?php
// Set the database credentials
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'db_practice';

// Connect to the database
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>
