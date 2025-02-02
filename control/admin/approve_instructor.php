<?php
session_start();
require_once '../../model/admin/Instructor.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
if (!isset($id)) {
    header("Location: ../../view/admin/instructors.php");
    die();
}
Instructor::approve($id);

header("Location: ../../view/admin/instructors.php");
?>