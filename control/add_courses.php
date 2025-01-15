<?php
session_start();
include '../model/db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$db = new Db();
$conn = $db->open();



$stmt->close();
$conn->close();
?>
<br>
<a href="../view/admin/instructors.php">Back to Instructors</a>