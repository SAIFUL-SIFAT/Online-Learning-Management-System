<!DOCTYPE html>
<html lang="en">
<head>
    <title>Instructor Registration Info</title>
</head>
<body>
    <h2>Instructor Registration Info</h2>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require '../model/db.php';

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

    if (empty($_POST["gender"])) {
        $errors['gender'] = "Gender is required.";
    }

    if (empty($errors)) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $qualifications = $_POST['qualifications'];
        $expertise = $_POST['expertise'];
        $T_experience = $_POST['T_experience'];
        $gender = $_POST['gender'];
        

        $user_data = array(
            "full_name" => $full_name,
            "email" => $email,
            "phone" => $phone,
            "pass" => $pass,
            "con_pass" => $_POST['con_pass'],
            "qualifications" => $qualifications,
            "expertise" => $expertise,
            "T_experience" => $T_experience,
            "gender" => $gender
        );
        $json_data = json_encode($user_data, JSON_PRETTY_PRINT);
        file_put_contents("../data/userdata.json", $json_data);
        

        $db = new myDB();
        $db->insertData($full_name, $email, $phone, $pass, $qualifications, $expertise, $T_experience,$gender);


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
    echo "<p>No data submitted.</p>";
}
?>

</body>
</html>
