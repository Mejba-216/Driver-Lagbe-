<?php
// Include the database connection
include 'connect.php';
session_start();

// Check if the user is logged in and is a Driver
if (!isset($_SESSION['email']) || $_SESSION['user_type'] !== 'Driver') {
    header('Location: login.php');
    exit;
}

// Fetch the logged-in user's email
$driver_email = $_SESSION['email'] ?? null;

if (!$driver_email) {
    die("Error: Email is not set in the session. Please log in again.");
}

// Fetch the existing profile if it exists
$query = "SELECT * FROM Driver WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $driver_email);
$stmt->execute();
$result = $stmt->get_result();
$driver = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $area = $_POST['area'];
    $city = $_POST['city'];
    $experience = $_POST['experience'];
    $license_no = $_POST['license_no'];

    if ($driver) {
        // Update the profile
        $update_query = "UPDATE Driver SET Name = ?, Phone = ?, Area = ?, City = ?, Experience = ?, LicenseNo = ? WHERE Email = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssssiss", $name, $phone, $area, $city, $experience, $license_no, $driver_email);
        $stmt->execute();
    } else {
        // Insert a new profile
        $insert_query = "INSERT INTO Driver (Name, Phone, Email, Area, City, Experience, LicenseNo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssssisi", $name, $phone, $driver_email, $area, $city, $experience, $license_no);
        $stmt->execute();
    }

    // Refresh the page to reflect changes
    header("Location: driver_profile.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Driver Profile</h1>
        </header>
        <form action="driver_profile.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($driver['Name'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($driver['Phone'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" value="<?= htmlspecialchars($driver_email) ?>" disabled>
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input type="text" id="area" name="area" value="<?= htmlspecialchars($driver['Area'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="<?= htmlspecialchars($driver['City'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="experience">Experience</label>
                <input type="text" id="experience" name="experience" value="<?= htmlspecialchars($driver['Experience'] ?? '') ?>" required>
            </div>
            <div class="form-group">
                <label for="license_no">License Number</label>
                <input type="text" id="license_no" name="license_no" value="<?= htmlspecialchars($driver['LicenseNo'] ?? '') ?>" required>
            </div>
            <footer>
                <button type="submit">Save</button>
            </footer>
        </form>
    </div>
</body>
</html>
