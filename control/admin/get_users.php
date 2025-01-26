<?php

include_once ("../../model/admin/User.php");

$type = $_GET['type'] ?? 'student';
$page = $_GET['page'] ?? 1;
$limit = 10;
$offset = $page ? ($page * $limit) - $limit : 0;

header('Content-Type: application/json');

echo json_encode(User::getUsers($type, $offset, $limit)) ?? json_encode([]);