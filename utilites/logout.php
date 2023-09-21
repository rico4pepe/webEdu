<?php
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect the user to a login page or another appropriate page
header("Location: ../index.php"); // Change "login.php" to your actual login page
exit();
?>