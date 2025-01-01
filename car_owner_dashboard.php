<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'Car Owner') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Owner Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= $_SESSION['name']; ?> (Car Owner)</h1>
    <p>This is the car owner dashboard.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
