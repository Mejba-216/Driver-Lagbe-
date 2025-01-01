<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "driverlagbe";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Connection is successful
    // Uncomment the line below to confirm connection in testing
    // echo "Connected successfully to the database.";
}
?>
