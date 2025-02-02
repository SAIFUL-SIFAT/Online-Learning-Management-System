<?php
session_start();
include '../../model/admin/Instructor.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
Instructor::reject($id);

?>
<br>
<a href="../../view/admin/instructors.php">Back to Instructors</a>