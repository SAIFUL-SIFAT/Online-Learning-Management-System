<?php
session_start();
include '../../model/instructor/db.php';

if (!isset($_SESSION['full_name'])) {
    header("Location: login.php");
    exit();
}

$db = new myDB();
$conn = $db->open();

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

    if ($db->createCourse($conn, $instructor_id, $title, $description)) {
        header('Location:../../view/instructor/courses.php');
    } else {
        echo "Error creating course.";
    }
}

$conn->close();
