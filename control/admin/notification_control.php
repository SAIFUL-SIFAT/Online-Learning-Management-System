<?php session_start();
include '../../model/admin/Notification.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

function getAllNotifications(): array {
    return Notification::getAllNotifications();
}