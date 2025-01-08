<?php

session_start();

require('../model/db.php');

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die('All fields are required!');
}

$db = new Db();
$result = $db->getLoginData($_POST['username'], $_POST['password']);

if ($result == null) {
    die('No user found');
    session_destroy();
}

unset($result['password']);
$_SESSION = $result;

header('location: ../view/admin/profile.php');
