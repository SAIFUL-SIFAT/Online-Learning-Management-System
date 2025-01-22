<?php
include '../../model/admin/Notification.php';

function getAllNotifications(): array {
    return Notification::getAllNotifications();
}