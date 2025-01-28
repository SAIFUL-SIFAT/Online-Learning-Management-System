<?php
// quizzes_db.php

$host = 'localhost'; // your database host
$dbname = 'new_project'; // your database name
$username = 'root'; // your username
$password = ''; // your password

try {
    // Create database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

// Get Upcoming Quizzes
function getUpcomingQuizzes() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM quizzes WHERE due_date > NOW()");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
