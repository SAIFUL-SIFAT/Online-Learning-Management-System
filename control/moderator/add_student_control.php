<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();    
include '../../model/moderator/db.php';
$db = new Db();
if(isset($_POST['full_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['country']) && isset($_POST['preferred_language'])) {
    $full_name = $_POST['full_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $preferred_language = $_POST['preferred_language'];
    $result = $db->addStudent($full_name, $last_name, $email, $phone, $country, $preferred_language);
    if($result) {
        header("Location: ../../view/moderator/student_management.php");
    } else {
        echo "Failed to add student";
    }
}