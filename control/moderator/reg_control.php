<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../model/moderator/db.php';

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'] ;
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'] ;
    $phone_number = $_POST['phone_number'];
    $department = $_POST['department'] ;
    $manager = $_POST['manager'];
    $work_location = $_POST['work_location'];

    if (empty($full_name)) {
        $errors[] = "Full Name is required.";
    } elseif (is_numeric($full_name)) {
        $errors[] = "Full Name should not contain any numbers.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($phone_number)) {
        $errors[] = "Phone Number is required.";
    } elseif (!is_numeric($phone_number)) {
        $errors[] = "Phone Number must only contain numbers.";
    } elseif (strlen($phone_number) > 11) {
        $errors[] = "Phone Number cannot be longer than 11 digits.";
    }

    if (empty($errors)) {
        $db = new Db();
        $db->insertData($full_name, $email, $username, $password, $phone_number, $department, $manager, $work_location);
    header('Location: ../../view/moderator/signin.php');
        echo "Form submitted successfully!";
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>
