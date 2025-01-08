<?php

session_start();

require('../model/db.php');

if (!isset($_SESSION['admin_id']))
    die('user not found!');

$_POST['admin_id'] = $_SESSION['admin_id'];

$db = new Db();
$db->updateData($_POST);

header('location: ../view/admin/profile.php');
