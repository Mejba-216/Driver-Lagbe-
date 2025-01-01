<?php
// Start the session
session_start();

// Check if the user is logged in and is a Driver
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Driver') {
    header('Location: login.php');
    exit;
}

// Include the database connection
include 'connect.php';

// Fetch the logged-in user's data from the database
$driver_email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $driver_email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">Driver Dashboard</div>
        <nav>
            <ul>
                <li><a href="#job-posts">Job Posts</a></li>
                <li><a href="driver_profile.php">Profile</a></li>
                <li><a href="#helpline">Helpline</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    

    <footer class="footer">
        <p>Driver Lagbe © 2024. All Rights Reserved.</p>
    </footer>
</body>
</html>
