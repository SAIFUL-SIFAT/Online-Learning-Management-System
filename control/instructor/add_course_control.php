<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../../model/instructor/db.php';

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
    exit();
}

$db = new MyDB();
// $conn = $db->open();

if (empty($_POST['instructor_id'])) {
    echo 'no instructor_id';
    exit();
} elseif (empty($_POST['title'])) {
    echo 'title missing';
    exit();
}elseif (empty($_POST['description'])) {
        echo 'description missing';
        exit();
} else {
    $instructor_id = $_POST['instructor_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    header('Location:../../view/instructor/courses.php');
    if ($db->addCourse($instructor_id, $title, $description)) {
        $conn->close();

       
    } else {
        echo "Error creating course.";
    }
}

// $conn->close();
