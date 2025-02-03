<?php
session_start();
include '../../model/admin/Instructor.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
if (!isset($id)) {
    header("Location: ../../view/admin/instructors.php");
    die();
}

Instructor::reject($id);

header("Location: ../../view/admin/instructors.php");
?>