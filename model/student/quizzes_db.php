<?php

$host = 'localhost'; // your database host
$dbname = 'project'; // your database name
$username = 'root'; // your username
$password = ''; // your password

// Create database connection using mysqli OOP
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Get Upcoming Quizzes
function getUpcomingQuizzes() {
    global $mysqli;
    $query = "SELECT * FROM quizzes WHERE due_date > NOW()";
    $result = $mysqli->query($query);
    
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}
?>
