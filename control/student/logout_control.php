<?php
session_start();

// Destroy the session
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

// Redirect to login page
header("Location: ../../view/student/sign_in.php");
exit();
?>