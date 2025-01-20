<?php
session_start();
include '../../model/admin/db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_GET['id'])) {
    echo 'no course id';
    exit();
}

$db = new Db();
$conn = $db->open();
$sql = "DELETE FROM course WHERE course_id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "i",
        $_GET['id'],
    );

    if ($stmt->execute()) {
        header('Location: ' . '../../view/admin/courses.php');
    } else {
        echo $stmt->error;
    }

    $stmt->close();
} else {
    echo $conn->error;
}

$conn->close();
