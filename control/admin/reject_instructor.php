<?php
session_start();
include '../../model/admin/db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$db = new Db();
$conn = $db->open();

$sql = "DELETE FROM instructor WHERE instructor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);


if ($stmt->execute()) {
    echo "Instructor rejected.";
} else {
    echo $conn->error;
}

$stmt->close();
$conn->close();
?>
<br>
<a href="../../view/admin/instructors.php">Back to Instructors</a>