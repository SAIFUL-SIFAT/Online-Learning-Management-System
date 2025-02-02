<?php
session_start();


if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

const PROFILE_PHOTO_UPLOAD_DIR = '../../uploads/admin/profile/';
if (!file_exists(PROFILE_PHOTO_UPLOAD_DIR)) {
    echo mkdir(PROFILE_PHOTO_UPLOAD_DIR, 0777, true);
}

$_POST['admin_id'] = $_SESSION['admin_id'];

$is_uploaded = is_uploaded_file($_FILES['profile_photo']['tmp_name']);
if ($is_uploaded) {
    $extension = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
    $new_path = PROFILE_PHOTO_UPLOAD_DIR . basename($_FILES['profile_photo']['tmp_name']) . "." . $extension;
    if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $new_path)) {
        $_POST['profile_photo'] = $new_path;
        $_SESSION['profile_photo'] = $new_path;
    }
}

require_once '../../model/admin/Admin.php';
Admin::update($_POST);

header('location: ../../view/admin/profile.php');
