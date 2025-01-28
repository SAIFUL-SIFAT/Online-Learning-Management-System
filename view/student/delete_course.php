 <?php
 /*
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ..\..\view\student\sign_in.php");
    exit();
}

include '../../model/student/db.php';

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $db = new myDB();
    $result = $db->deleteCourse($course_id);

    if ($result) {
        echo "Course deleted successfully.";
        header("Location: course.php");
    } else {
        echo "Error deleting course.";
    }
} else {
    echo "Course ID not provided.";
}
*/
?> 
