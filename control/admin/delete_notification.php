<?php session_start();
include '../../model/admin/Notification.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
if (empty($_GET['id'])) {
    echo 'no course id';
    exit();
}

Notification::deleteNotification($_GET['id']);
