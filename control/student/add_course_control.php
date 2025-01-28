<?php
/*
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../sign_in.php");
    exit();
}
include '../../model/student/db.php';

// Check if course_id is provided
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    // Instantiate the database class
    $db = new myDB();
    $result = $db->deleteCourse($course_id);

    if ($result) {
        echo "Course deleted successfully.";
        header("Location: course.php");
        exit();
    } else {
        echo "Error deleting course.";
    }
} else {
    echo "Course ID not provided.";
}
    
?>
<!-- <?php/*
// Updated course_control.php to handle adding and deleting courses dynamically

session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../sign_in.php");
    exit();
}

include '../../model/student/db.php';

$db = new myDB();

// Process the action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $course_id = $_POST['course_id'];

    // Add course to enrolled list
    if ($action === 'add') {
        $conn = $db->openCon();
        $stmt = $conn->prepare("UPDATE courses SET status = 'enrolled' WHERE course_id = ?");
        $stmt->bind_param("i", $course_id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Course successfully enrolled.";
        } else {
            $_SESSION['message'] = "Failed to add course.";
        }
        $stmt->close();
        $db->closeConn($conn);
        header("Location: ../../view/student/dashboard.php");
        exit();
    }

    if ($action === 'delete') {
        // Reset course status to 'available'
        $conn = $db->openCon();
        $stmt = $conn->prepare("UPDATE courses SET status = 'available' WHERE course_id = ?");
        $stmt->bind_param("i", $course_id);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Course deleted successfully.";
        } else {
            $_SESSION['message'] = "Failed to delete course.";
        }
        $stmt->close();
        $db->closeConn($conn);
        header("Location: ../../view/student/dashboard.php");
        exit();
    } 
}
*/
?>
<?php
//add_course_control.php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();
include '../../model/student/db.php';

if (!isset($_SESSION['full_name']) || !isset($_SESSION['student_id'])) {
    header("Location: ../../sign_in.php");
    exit();
}

// Ensure this script only handles POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $student_id = $_SESSION['student_id']; // Get student ID from session

    $db = new myDB();
    
    if ($db->addCourseToEnrollment($course_id, $student_id)) {
        header("Location: ../../view/student/course.php");
    } 
    exit();
}
?>

