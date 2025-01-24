<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Destroy the session
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

// Redirect to login page
header("Location: ../../view/instructor/login.php");
exit();
?>
