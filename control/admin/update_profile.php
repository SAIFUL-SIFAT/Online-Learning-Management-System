<?php
session_start();

require('../model/db.php');

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$_POST['admin_id'] = $_SESSION['admin_id'];

$db = new Db();
$db->updateData($_POST);

header('location: ../view/admin/profile.php');
