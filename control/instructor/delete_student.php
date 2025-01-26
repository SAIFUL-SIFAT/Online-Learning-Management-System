<?php
session_start();
include '../../model/instructor/db.php';

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
    exit();
}


$db = new MyDB();
$conn = $db->openConn();
$sql = "DELETE FROM student WHERE student_id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "i",
        $_GET['student_id'],
    );

    if ($stmt->execute()) {
        header('Location: ' . '../../view/instructor/Student_management.php');
    } else {
        echo $stmt->error;
    }

    $stmt->close();
} else {
    echo $conn->error;
}

$conn->close();
