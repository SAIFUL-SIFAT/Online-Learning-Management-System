<?php
session_start();

// Redirect to sign-in page if the user is not logged in
if (!isset($_SESSION['full_name'])) {
    header("Location: ../../sign_in.php");
    exit();
}

include('../../model/student/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $full_name = $_POST['full_name'];
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = $_POST['email'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $preferred_language = $_POST['preferred_language'];
    $password = $_POST['password'];
    
    // // Handle file upload for profile picture
    // $profile_picture = '';
    // if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
    //     $profile_picture = $_FILES['profile_picture']['name'];
    //     // Move the uploaded file to the desired directory (add your path here)
    //     move_uploaded_file($_FILES['profile_picture']['tmp_name'], "../../uploads/" . $profile_picture);
    // }

    // Retrieve student_id from session
    $student_id = $_SESSION['student_id'];
    
    // Create a new database instance and update data
    $db = new myDB();
    
    $db->updateData($full_name, $student_id, $password, $email, $preferred_language, $last_name, $phone, $dob, $country, $profile_picture);

    // Update the session with the new data
    $_SESSION['full_name'] = $full_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['phone'] = $phone;
    $_SESSION['preferred_language'] = $preferred_language;
    $_SESSION['dob'] = $dob;
    $_SESSION['country'] = $country;
    $_SESSION['profile_picture'] = $profile_picture;

    // Redirect to the profile page
    header('Location: ../../view/student/profile.php');
    exit();
} else {
    echo "<p>Invalid request method!</p>";
}
?>
