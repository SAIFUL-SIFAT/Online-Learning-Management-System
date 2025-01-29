<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();
$_SESSION['full_name'] = $_POST['full_name'];


// Include the database connection
include '../../model/moderator/db.php';

// Validate POST data
if (!isset($_POST['full_name']) || !isset($_POST['password'])) {
    die('All fields are required!');
}

// Sanitize user inputs
$full_name = htmlspecialchars($_POST['full_name']);
$password = htmlspecialchars($_POST['password']);

// Initialize the database connection
$db = new Db();

// Fetch user data based on credentials
$result = $db->getLoginData($full_name, $password);

if (!$result) {
    die('Error: No user found with the provided credentials.');
    session_destroy();
}

unset($result['password']);

$_SESSION = $result;

header('Location: ../../view/moderator/dashboard.php');
exit;


?>
