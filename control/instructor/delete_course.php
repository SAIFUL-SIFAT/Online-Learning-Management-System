<?php
session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include '../../model/instructor/db.php';

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
    exit();
}

$db = new MyDB();
$conn = $db->openConn();
$sql = "DELETE FROM course WHERE course_id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "i",
        $_GET['course_id'],
    );

    if ($stmt->execute()) {
        header('Location: ' . '../../view/instructor/courses.php');
    } else {
        echo $stmt->error;
    }

    $stmt->close();
} else {
    echo $conn->error;
}

$conn->close();
?>