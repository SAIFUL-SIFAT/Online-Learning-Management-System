<?php

// dashboard_db.php

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

// Get Enrolled Courses
function getEnrolledCourses() {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM courses WHERE status = 'enrolled'");
    return $stmt->fetchColumn();
}

// Get Completed Quizzes
function getCompletedQuizzes() {
    global $pdo;
    $stmt = $pdo->query("SELECT COUNT(*) FROM quizzes WHERE status = 'completed'");
    return $stmt->fetchColumn();
}

// Get Average Grade
function getAverageGrade() {
    global $pdo;
    $stmt = $pdo->query("SELECT AVG(grade) FROM grades");
    return $stmt->fetchColumn();
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