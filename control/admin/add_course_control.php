<?php
session_start();
include '../model/db.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_POST['instructor_id'])) {
    echo 'no instructor_id';
    exit();
} else if (empty($_POST['title'])) {
    echo 'title missing';
    exit();
}

$db = new Db();
$conn = $db->open();
$sql = "INSERT INTO course (instructor_id, title, description) VALUES (?, ?, ?)";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "iss",
        $_POST['instructor_id'],
        $_POST['title'],
        $_POST['description'],
    );

    if ($stmt->execute()) {
        header('Location: ' . '../view/admin/add_course.php');
    } else {
        echo $stmt->error;
    }

    $stmt->close();
} else {
    echo $conn->error;
}

$conn->close();
