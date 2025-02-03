<?php

// dashboard_db.php

$host = 'localhost'; // your database host
$dbname = 'new_project'; // your database name
$username = 'root'; // your username
$password = ''; // your password

// Create database connection using mysqli OOP
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Get Enrolled Courses
function getEnrolledCourses() {
    global $mysqli;
    $query = "SELECT COUNT(*) FROM courses WHERE status = 'enrolled'";
    $result = $mysqli->query($query);
    $row = $result->fetch_row();
    return $row[0]; // Return the count of enrolled courses
}

// Get Completed Quizzes
function getCompletedQuizzes() {
    global $mysqli;
    $query = "SELECT COUNT(*) FROM quizzes WHERE status = 'completed'";
    $result = $mysqli->query($query);
    $row = $result->fetch_row();
    return $row[0]; // Return the count of completed quizzes
}

// Get Average Grade
function getAverageGrade() {
    global $mysqli;
    $query = "SELECT AVG(grade) FROM grades";
    $result = $mysqli->query($query);
    $row = $result->fetch_row();
    return $row[0]; // Return the average grade
}

?>

<?php
/*
// Updated dashboard_db.php for dynamic enrolled course handling

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

// Get Enrolled Courses Count
function getEnrolledCourses() {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM courses WHERE status = 'enrolled'");
    return $stmt->fetchColumn();
}

// Get Available Courses
function getAvailableCourses() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM courses WHERE status = 'available'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add Course by ID
function addCourse($course_id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE courses SET status = 'enrolled' WHERE course_id = ?");
    return $stmt->execute([$course_id]);
}

// Delete Course by ID
function deleteCourse($course_id) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE courses SET status = 'available' WHERE course_id = ?");
    return $stmt->execute([$course_id]);
} 
    */
?>