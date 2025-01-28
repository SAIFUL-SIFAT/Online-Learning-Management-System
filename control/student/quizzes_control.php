<?php
// quizzes_control.php

 session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: sign_in.php");
    exit();
}


include('quizzes_db.php');

// Fetch upcoming quizzes
$upcoming_quizzes = getUpcomingQuizzes();
?>
