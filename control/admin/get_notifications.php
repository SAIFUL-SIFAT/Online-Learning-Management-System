<?php session_start();
include '../../model/admin/Notification.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

echo json_encode(Notification::getAllNotifications()) ?? json_encode([]);
