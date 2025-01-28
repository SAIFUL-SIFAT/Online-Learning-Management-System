<?php
// grades_control.php

// include('grades_db.php');

// $course_grades = getCourseGrades();
?>

<?php
 session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: sign_in.php");
    exit();
}
?>
