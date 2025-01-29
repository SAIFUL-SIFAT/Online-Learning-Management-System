<?php
session_start();
include_once ("../../model/admin/User.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$type = $_GET['type'] ?? 'student';
$page = $_GET['page'] ?? 1;
$limit = $_GET['limit'] ?? 10;
$offset = $page ? ($page * $limit) - $limit : 0;

header('Content-Type: application/json');

echo json_encode(User::getUsers($type, $offset, $limit)) ?? json_encode([]);