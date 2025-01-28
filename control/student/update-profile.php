<?php
session_start();

require('../../model/student/db.php');

if (!isset($_SESSION['full_name'])) {
    header("Location: sign_in.php");
    exit();
}

$_POST['full_name'] = $_SESSION['full_name'];

$db = new Db();
$db->updateData($_POST);

header('location: ../../view/student/profile.php');