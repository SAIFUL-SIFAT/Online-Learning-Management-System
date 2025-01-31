<?php
// drop_course.php
session_start();
include '../../model/student/db.php';

if (!isset($_SESSION['full_name']) || !isset($_SESSION['student_id'])) {
    header("Location: ../../view/student/sign_in.php");
    exit();
}

// Ensure this script only handles GET requests
if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $student_id = $_SESSION['student_id']; // Get student ID from session

    $db = new myDB();

    // Remove the course from enrollment
    if ($db->removeCourseFromEnrollment($course_id, $student_id)) {
        header("Location: ../../view/student/course.php");
    } 
    exit();
}
?>
