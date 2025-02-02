<?php
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
    session_unset();
}

session_start();

require_once ('../../model/admin/Admin.php');

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die('All fields are required!');
}

$result = Admin::getAdmin($_POST['username'], $_POST['password']);

if ($result === null) {
    session_destroy();
    header('location: ../../view/admin/login.php?error=1');
    exit();
}

unset($result['password']);
$_SESSION = $result;

header('location: ../../view/admin/profile.php');
