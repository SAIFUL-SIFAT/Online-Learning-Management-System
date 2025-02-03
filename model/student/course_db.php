<?php
// courses_db.php

$host = 'localhost'; // your database host
$dbname = 'project'; // your database name
$username = 'root'; // your username
$password = ''; // your password

// Create database connection using mysqli OOP
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Get Available Courses
function getAvailableCourses() {
    global $mysqli;
    $query = "SELECT * FROM courses WHERE status = 'available'";
    $result = $mysqli->query($query);

    // Fetch all rows as an associative array
    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return []; // Return an empty array if the query fails
    }
}
?>
