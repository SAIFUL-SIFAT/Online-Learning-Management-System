
<?php

session_start();


require('../../model/student/db.php');

if (!isset($_POST['full_name']) || !isset($_POST['password'])) {
    die('All fields are required!');
}

$db = new myDB();
$result = $db->getData($_POST['full_name'], $_POST['password']);

if ($result == null) {
    die('No user found');
    session_destroy();
}

unset($result['password']);
$_SESSION = $result;
header('location:../../view/student/dashboard.php');
?>