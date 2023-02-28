<?php
// Set database credentials
$host = "localhost";
$user = "root";
$password = "";
$database = "db_practice";

// Create database connection
$conn = new mysqli($host, $user, $password, $database);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get login form data
$username = $_POST["username"];
$password = $_POST["password"];


// Prepare SQL statement to check if user exists with the given credentials
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists with the given credentials
if ($result->num_rows == 1) {
    // User exists, set session variable and return success message
    session_start();
    $_SESSION["username"] = $username;
    echo "success";
} else {
    // Invalid username or password, return error message
    echo "error";
}

// Close database connection
$stmt->close();
$conn->close();
?>
