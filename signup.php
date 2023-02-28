<?php
// Get the database connection
require_once 'db_connect.php';

// Get the POST data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password for security
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL statement with placeholders
$stmt = mysqli_prepare($con, "INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

// Bind the parameters to the statement
mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $password_hash);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "success";
} else {
    echo "Error: " . mysqli_error($con);
}

// Close the statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($con);
?>
