<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['full_name'])) {
    header("Location: signin.php");
}

include '../../model/moderator/db.php';

$db = new Db();



if(isset($_POST['instructor_id'], $_POST['title'], $_POST['description']) ){
    $instructor_id = $_POST['instructor_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $result = $db->addCourse($instructor_id, $title, $description);

    if($result) {
        header("Location: ../../view/moderator/course_management.php");
    } else {
        echo "Failed to add course";
    }
} else {
    echo "All fields are required.";
}
?>