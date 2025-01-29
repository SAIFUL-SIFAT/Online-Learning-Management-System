<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../model/moderator/db.php';

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../signin.php");
    exit();
}

$db = new Db();
$conn = $db->openConn();
if (!$conn) {
    echo "Error connecting to the database: " . $db->conn->connect_error;
    exit();
}

$sql = "DELETE FROM course WHERE course_id = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param(
        "i",
        $_GET['course_id']
    );

    if ($stmt->execute()) {
        header('Location: ../../view/moderator/course_management.php');
        exit();
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$conn->close();
