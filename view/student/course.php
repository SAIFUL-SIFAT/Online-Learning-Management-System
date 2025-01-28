<?php
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ..\..\view\student\sign_in.php");
    exit();
}
include '../../model/student/db.php';
$student_id = $_SESSION['student_id']; // Fetch student ID from session

$db = new myDB();
$courses = $db->fetchAllCourses();
$enrolled=$db->fetchEnrolledCourses($student_id);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Registration Form</title>
    <link rel="stylesheet" href="..\..\assets\css\student\course.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="hero">
        <nav>
            <h2>Student Portal</h2>
            <header>
                <input type="text" placeholder="Search courses, quizzes, or certificates...">
            </header>

            <ul>
                <li><a href="dashboard.php" class="active"><i class="fa fa-chart-pie"></i> Dashboard</a></li>
                <li><a href="course.php"><i class="fa fa-book"></i> Courses</a></li>
                <li><a href="quizzes.php"><i class="fa fa-pencil-alt"></i> Quizzes</a></li>
                <li><a href="grades.php"><i class="fa fa-graduation-cap"></i> Grades</a></li>
                <li><a href="certificates.php"><i class="fa fa-certificate"></i> Certificates</a></li>
                <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                <a href="../../control/student/logout_control.php" class="logout-btn">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </ul>
            <img src="image/image.png" class="user-pic">
            <span class="notification"></span>



        </nav>
        <div class="available-courses">
            <h2>Available Courses</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Course ID</th>
                        <th>Instructor ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($courses as $course) {
                        echo "<tr>";
                        echo "<td>" . $course['course_id'] . "</td>";
                        echo "<td>" . $course['instructor_id'] . "</td>";
                        echo "<td>" . $course['title'] . "</td>";
                        echo "<td>" . $course['description'] . "</td>";
                        echo "<td> <form action='../../control/student/add_course_control.php' method='POST'>
                                <input type='hidden' name='course_id' value='" . htmlspecialchars($course['course_id']) . "'>
                                <button type='submit' class='btn btn-primary'>Add</button>
                            </form></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- <a href="add_course.php" class="btn btn-success">Add New Course</a> -->
        </div>
        <div class="current-courses">
            <h2>Current Courses</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Enrollment ID</th>
                        <th>Course ID</th>
                        <th>Student ID</th>
                   </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($enrolled as $en) {
                        echo "<tr>";
                        echo "<td>" . $en['enrollment_id'] . "</td>";
                        echo "<td>" . $en['course_id'] . "</td>";
                        echo "<td>" . $en['student_id'] . "</td>";
                        // echo "<td><a href='delete_course.php?course_id=" . $course['course_id'] . "' class='btn btn-primary'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- <a href="add_course.php" class="btn btn-success">Add New Course</a> -->
        </div>
    </div>

    </div>

</body>

</html>