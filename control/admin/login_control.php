<?php
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
    session_unset();
}

session_start();

require('../../model/admin/db.php');

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die('All fields are required!');
}

$db = new Db();
$result = $db->getLoginData($_POST['username'], $_POST['password']);

if ($result == null) {
    session_destroy();
    die('No user found');
}

unset($result['password']);
$_SESSION = $result;

header('location: ../../view/admin/profile.php');
