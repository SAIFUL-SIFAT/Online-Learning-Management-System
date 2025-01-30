<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// session_start();
// include '../../model/instructor/db.php';

// if (!isset($_SESSION['full_name'])) {
//     header("Location: ../../login.php");
//     exit();
// }

// $db = new MyDB();
// // $conn = $db->open();

// if (empty($_POST['instructor_id'])) {
//     echo 'no instructor_id';
//     exit();
// } elseif (empty($_POST['title'])) {
//     echo 'title missing';
//     exit();
// }elseif (empty($_POST['description'])) {
//         echo 'description missing';
//         exit();
// } else {
//     $instructor_id = $_POST['instructor_id'];
//     $title = $_POST['title'];
//     $description = $_POST['description'];
//     header('Location:../../view/instructor/courses.php');
//     if ($db->addCourse($instructor_id, $title, $description)) {
//         $conn->close();

       
//     } else {
//         echo "Error creating course.";
//     }
// }

// $conn->close();


error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../../model/instructor/db.php';

if (!isset($_SESSION['full_name'])) {
    echo json_encode(array('success' => false, 'error' => 'Not logged in'));
    exit();
}

$db = new MyDB();
$conn = $db->openConn();

if (empty($_POST['instructor_id'])) {
    echo json_encode(array('success' => false, 'error' => 'No instructor_id provided'));
    exit();
} elseif (empty($_POST['title'])) {
    echo json_encode(array('success' => false, 'error' => 'Title missing'));
    exit();
} elseif (empty($_POST['description'])) {
    echo json_encode(array('success' => false, 'error' => 'Description missing'));
    exit();
} else {
    $instructor_id = $_POST['instructor_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if ($db->addCourse($instructor_id, $title, $description)) {
        header("Location: ../../view/instructor/courses.php");
        exit;
    } else {
        // No need to display any error message, simply redirect
        header("Location: ../../view/instructor/courses.php");
        exit;
    }
    
    
}

$conn->close();
