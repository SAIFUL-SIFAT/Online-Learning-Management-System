<?php
session_start();
include '../../model/admin/Course.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_GET['id'])) {
    echo 'no course id';
    exit();
}

if (Course::delete($_GET['id'])) {
    header('Location: ' . '../../view/admin/courses.php');
} else {
    echo 'error while deleting course';
}
