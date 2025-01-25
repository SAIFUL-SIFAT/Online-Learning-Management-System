<?php
session_start();
include '../../model/instructor/db.php';

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
    exit();
}

if (empty($_GET['id'])) {
    echo 'no course id';
    exit();
}

$db = new MyDB();
$conn = $db->open();
$sql = "DELETE FROM student WHERE student_id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "i",
        $_GET['id'],
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
