<?php
//add_course_control.php

session_start();
include '../../model/student/db.php';

if (!isset($_SESSION['full_name']) || !isset($_SESSION['student_id'])) {
    header("Location: ../../sign_in.php");
    exit();
}

// Ensure this script only handles POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $student_id = $_SESSION['student_id']; // Get student ID from session

    $db = new myDB();
    
    if ($db->addCourseToEnrollment($course_id, $student_id)) {
        // Redir
        header("Location: ../../view/student/course.php");
        exit();
    } else {
     
        header("Location: ../../view/student/course.php");
        exit();
    }
}
?>
