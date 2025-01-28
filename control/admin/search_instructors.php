<?php
session_start();
include_once("../../model/admin/Instructor.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$search_text = $_GET['query'] ?? '';

header('Content-Type: application/json');

echo json_encode(Instructor::searchInstructor($search_text) ?? json_encode([]));
