<?php session_start();
include '../../model/admin/Notification.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_POST['message'])) {
    echo 'message missing';
    exit();
}

Notification::create($_POST['message'], $_POST['type']);