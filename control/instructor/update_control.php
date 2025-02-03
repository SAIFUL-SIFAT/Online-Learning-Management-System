<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../model/instructor/db.php';

const PROFILE_PHOTO_UPLOAD_DIR = '../../uploads/instructor/profile/';
if (!file_exists(PROFILE_PHOTO_UPLOAD_DIR)) {
    echo mkdir(PROFILE_PHOTO_UPLOAD_DIR, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'] ?? null;
    $email = $_POST['email'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $pass = $_POST['pass'] ?? null;
    $qualifications = $_POST['qualifications'] ?? null;
    $expertise = $_POST['expertise'] ?? null;
    $teaching_experience = $_POST['teaching_experience'] ?? null;
    $institution = $_POST['institution'] ?? null;
    $profile_picture = $_POST['profile_picture'] ?? null;

    // Handle profile picture upload
    $is_uploaded = is_uploaded_file($_FILES['profile_picture']['tmp_name']);
    if ($is_uploaded) {
        $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
        $new_path = PROFILE_PHOTO_UPLOAD_DIR . basename($_FILES['profile_picture']['tmp_name']) . "." . $extension;
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $new_path)) {
            $profile_picture = $new_path;
            $_SESSION['profile_picture'] = $new_path;
        }
    }



    // Debugging: Comment out these lines in production
    // print_r($_POST);
    // echo "Profile Picture Path: " . htmlspecialchars($profile_picture) . "<br>";

    // Update data in the database
    $db = new myDB();
    $db->updateData($full_name, $email, $phone, $pass, $qualifications, $profile_picture, $expertise, $teaching_experience, $institution);

    header('Location:../../view/instructor/profile.php');
    exit(); 
} else {
    echo "<p>Invalid request method!</p>";
}
?>
