<?php
require '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $pass = $_POST['pass'] ?? null;
    $qualifications = $_POST['qualifications'] ?? null;
    $expertise = $_POST['expertise'] ?? null;
    $T_experience = $_POST['T_experience'] ?? null;
    $gender = $_POST['gender'] ?? null;

    $profile_picture = null;
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] === 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $profile_picture = $target_file;
        } else {
            echo "<p>Failed to upload profile picture.</p>";
        }
    }

    print_r($_POST);

    echo "Profile Picture Path: " . $profile_picture . "<br>";

    $db = new myDB();
    $db->updateData($full_name, $email, $phone, $pass, $qualifications, $profile_picture, $expertise, $T_experience, $gender);

    // echo "<p>Data updated successfully!</p>";
    echo "<a href='update.php'>Go back to update page</a>";
} else {
    echo "<p>Invalid request method!</p>";
}

?>