<?php

session_start();
$_SESSION['full_name'] = $_POST['full_name'];
// $_SESSION['email'] = $_POST['email'];

require('../../model/instructor/db.php');

if (!isset($_POST['full_name']) || !isset($_POST['pass'])) {
    die('All fields are required!');
}

$db = new myDB();
$result = $db->getDataByCredentials($_POST['full_name'], $_POST['pass']);

if ($result == null) {
    die('No user found');
    session_destroy();
}

unset($result['pass']);
$_SESSION = $result;
header('location:../../view/instructor/dashboard.php');
?>