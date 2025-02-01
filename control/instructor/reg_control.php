<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../../model/instructor/db.php';

const PROFILE_PHOTO_UPLOAD_DIR = '../../uploads/instructor/profile/';
if (!file_exists(PROFILE_PHOTO_UPLOAD_DIR)) {
    echo mkdir(PROFILE_PHOTO_UPLOAD_DIR, 0777, true);
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["full_name"])) {
        $errors['full_name'] = "Full Name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $_POST["full_name"])) {
        $errors['full_name'] = "Full Name can only contain letters and spaces.";
    } elseif (strlen($_POST['full_name']) > 40) {
        $errors['full_name'] = "Full Name can be a maximum of 40 characters.";
    }

    if (empty($_POST["pass"])) {
        $errors['pass'] = "Password is required.";
    } elseif (strlen($_POST["pass"]) < 6) {
        $errors['pass'] = "Password must be at least 6 characters.";
    } elseif (!preg_match("/[a-z]/", $_POST["pass"])) {
        $errors['pass'] = "Password must contain at least one lowercase letter.";
    }

    if (empty($_POST["phone"])) {
        $errors['phone'] = "Phone Number is required.";
    } elseif (!preg_match("/^0[0-9]{10}$/", $_POST["phone"])) {
        $errors['phone'] = "Phone Number must start with 0 and be exactly 11 digits.";
    }

    // if (empty($_POST["gender"])) {
    //     $errors['gender'] = "Gender is required.";
    // }

    if (empty($errors)) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $qualifications = $_POST['qualifications'];
        $profile_picture = $_POST['profile_picture'];
        $expertise = $_POST['expertise'];
        $teaching_experience = $_POST['teaching_experience'];
        $institution = $_POST['institution'];

                // Handle profile photo upload
            // define("PROFILE_PHOTO_UPLOAD_DIR", '../../assets/uploads/');
            // if (!file_exists(PROFILE_PHOTO_UPLOAD_DIR)) {
            //     mkdir(PROFILE_PHOTO_UPLOAD_DIR, 0777, true);
            // }

            // $is_uploaded = is_uploaded_file($_FILES['profile_picture']['tmp_name']);
            // if ($is_uploaded) {
            //     $new_path = PROFILE_PHOTO_UPLOAD_DIR . basename($_FILES['profile_picture']['name']);
            //     if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $new_path)) {
            //         $_POST['profile_picture'] = $new_path; // Store the path for database insertion
            //     } else {
            //         $errors['profile_picture'] = "Failed to move uploaded file.";
            //     }
            // } else {
            //     if (empty($_FILES['profile_picture']['name'])) {
            //         $errors['profile_picture'] = "No file uploaded.";
            //     } else {
            //         $errors['profile_picture'] = "File upload error.";
            //     }
            // }

        $is_uploaded = is_uploaded_file($_FILES['profile_picture']['tmp_name']);
        if ($is_uploaded) {
            $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
            $new_path = PROFILE_PHOTO_UPLOAD_DIR . basename($_FILES['profile_picture']['tmp_name']) . "." . $extension;
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $new_path)) {
                $profile_picture = $new_path;
                $_SESSION['profile_picture'] = $new_path;
            }
        }

        if (empty($errors)) {
            $user_data = array(
                "full_name" => $full_name,
                "email" => $email,
                "phone" => $phone,
                "pass" => $pass,
                "qualifications" => $qualifications,
                "expertise" => $expertise,
                "teaching_experience" => $teaching_experience,
                "institution" => $institution,
                "profile_picture" => $profile_picture // Include profile photo path
            );

            // $json_data = json_encode($user_data, JSON_PRETTY_PRINT);
            // file_put_contents("../data/userdata.json", $json_data);

            $db = new myDB();
            $db->insertData($full_name, $email, $phone, $pass, $qualifications,$profile_picture, $expertise, $teaching_experience, $institution);

            header('location:../../view/instructor/login.php');
            echo "User data saved to the database.";
        } else {
            echo "<h2>Please correct the following errors:</h2>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>";
        }
    } else {
        echo "<h2>Please correct the following errors:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</ul>";
    }
} else {
    echo "<p>No data submitted.</p>";
}
?>
