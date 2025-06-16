<?php
session_start(); // Start the session

// Destroy session data
session_unset();
session_destroy();

// Redirect to login page
header("Location: login.html");
exit();
?>