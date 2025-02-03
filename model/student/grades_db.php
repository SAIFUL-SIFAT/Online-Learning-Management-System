<?php
// grades_db.php

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

// Get Course Grades
function getCourseGrades() {
    global $mysqli;
    $query = "SELECT * FROM grades";
    $result = $mysqli->query($query);

    // Check if the query was successful
    if ($result) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}
?>
