<?php

require('../../model/admin/db.php');
const PROFILE_PHOTO_UPLOAD_DIR = '../../uploads/admin/profile/';
if (!file_exists(PROFILE_PHOTO_UPLOAD_DIR)) {
    echo mkdir(PROFILE_PHOTO_UPLOAD_DIR, 0777, true);
}

$errors = array();

if (strlen($_POST['username']) < 4)
    $errors['username'] = "username must be at least 4 characters.";

if (strlen($_POST['password']) < 6)
    $errors['password'] = "password must be at least 6 characters.";
// if (!preg_match('/\S{2,}aiub\.edu/', $_POST['email']))
//    $errors['email'] = "Email must have aiub.edu domain";

if (strlen($_POST['admin_auth_code']) == 0)
    $errors['admin_auth_code'] = "Must supply an Admin auth code.";

if (!is_numeric($_POST['phone']))
    $errors['phone'] = "Phone number field must contain only numbers";


$is_uploaded = is_uploaded_file($_FILES['profile_photo']['tmp_name']);
if ($is_uploaded) {
    $extension = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
    $new_path = PROFILE_PHOTO_UPLOAD_DIR . basename($_FILES['profile_photo']['tmp_name']) . "." . $extension;
    if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $new_path)) {
        $_POST['profile_photo'] = $new_path;
        $_SESSION['profile_photo'] = $new_path;
    }
}

?>

<html>

<body>
    <?php
    if (!empty($errors)) {
        echo "<h2>Correct the following errors:</h2>";
        echo "<ul>";
        foreach ($errors as $error)
            echo "<li>$error</li>";
        echo "</ul>";
    } else {
        $db = new Db();
        $conn = $db->open();
        $db->insertData($_POST);
        $db->close($conn);
        header('Location: ../../view/admin/login.php');
    }
    ?>
</body>

</html>