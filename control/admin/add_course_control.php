<?php
session_start();

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

require_once "../../model/admin/Course.php";

$course = new Course($_POST);
$course->save();
