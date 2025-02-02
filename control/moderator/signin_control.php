<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$_SESSION['full_name'] = $_POST['full_name'];


include '../../model/moderator/db.php';


if (!isset($_POST['full_name']) || !isset($_POST['password'])) {
    die('All fields are required!');
}

$full_name = htmlspecialchars($_POST['full_name']);
$password = htmlspecialchars($_POST['password']);


$db = new Db();

$result = $db->getLoginData($full_name, $password);

if (!$result) {
    die('Error: No user found with the provided credentials.');
    session_destroy();
}

unset($result['password']);

$_SESSION = $result;

header('Location: ../../view/moderator/dashboard.php');
exit;


?>
