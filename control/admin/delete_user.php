<?php session_start();
include '../../model/admin/User.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_GET['id']) || empty($_GET['type'])) {
    echo 'invalid id';
    exit();
}

if (User::delete($_GET['type'], $_GET['id'])) {
    header('Location: ' . '../../view/admin/users.php');
} else {
    echo 'error while deleting user';
}
