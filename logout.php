<?php
// Start the session
session_start();

// Destroy the session and clear all session variables
session_unset();
session_destroy();

// Redirect the user to the login page
header("Location: index.php");
exit;
?>
