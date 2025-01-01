<?php
// Include the database connection file
include 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Lagbe - Connect Car Owners with Drivers</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="instyle.css">
    
</head>
<body>
    <header>
        Driver Lagbe
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="#contact">Contact</a>
    </nav>

    <section class="hero">
        <h1>Welcome to Driver Lagbe</h1>
        <p>Your go-to platform to connect car owners with professional drivers!</p>
        <a href="signup.php"><button>Sign Up</button></a>
        <a href="login.php"><button>Log In</button></a>
    </section>
    <section id="features" class="features">
        <div>
            <i class="fas fa-user-tie"></i>
            <h2>For Car Owners</h2>
            <p>Post job requirements, view driver profiles, and find the perfect match for your needs.</p>
        </div>
        <div>
            <i class="fas fa-id-card"></i>
            <h2>For Drivers</h2>
            <p>Create and update your profile, browse job listings, and apply for opportunities.</p>
        </div>
        <div>
            <i class="fas fa-cogs"></i>
            <h2>Automated Matching</h2>
            <p>Our system matches drivers and car owners based on location, availability, and experience.</p>
        </div>
    </section>
    <footer>
        <p>Driver Lagbe &copy; 2024. All Rights Reserved.</p>
        <p>Contact us: +880-1234-567890 | info@driverlagbe.com</p>
    </footer>
