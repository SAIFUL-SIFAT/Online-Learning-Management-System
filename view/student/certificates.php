<?php
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: sign_in.php");
    exit();
}
include "../../model/student/db.php";
$student_id = $_SESSION['student_id']; // Fetch student ID from session
$db= new myDB();
$courses=$db->fetchEnrolledCoursesName($student_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Registration Form</title>
    <link rel="stylesheet" href="..\..\assets\css\student\certificate.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Student Portal</h2>
            </div>

            <nav class="menu">
                <ul>
                    <li><a href="dashboard.php" class="active"><i class="fa fa-chart-pie"></i> Dashboard</a></li>
                    <li><a href="course.php"><i class="fa fa-book"></i> Courses</a></li>
                    <li><a href="quizzes.php"><i class="fa fa-pencil-alt"></i> Quizzes</a></li>
                    <li><a href="grades.php"><i class="fa fa-graduation-cap"></i> Grades</a></li>
                    <li><a href="certificates.php"><i class="fa fa-certificate"></i> Certificates</a></li>
                    <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <a href="../../control/student/logout_control.php" class="logout-btn">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
        <!-- dashboard -->
        <div class="content">
            <header>
                <input type="text" placeholder="Search courses, quizzes, or certificates...">
                <div class="profile">
                    <span class="notification"></span>
                    <img src="profile-pic.png" alt="Profile" class="profile-img">
                </div>
            </header>
            <!-- enrolled -->

            <!-- <div class="certificate">
    <h2>Your Certificates</h2>
    <div class="certificate-list">
        
        <div class="certificate-box">
            <p><strong>Python Programming</strong></p>
            <p>Issued: 2/15/2024</p>
            <p>Credential: CERT-PY-2024-001</p>
            <button class="download">Download</button>
            <button class="share">Share</button>
        </div>
        
        <div class="certificate-box">
            <p><strong>Database Management</strong></p>
            <p>Issued: 1/20/2024</p>
            <p>Credential: CERT-DB-2024-002</p>
            <button class="download">Download</button>
            <button class="share">Share</button>
        </div>

        
    </div>
</div> -->
<div class="certificate">
    <h2>Your Certificates</h2>
    <div class="certificate-list">
        <?php foreach ($courses as $course): ?>
            <div class="certificate-box">
                <p><strong><?php echo htmlspecialchars($course['title']); ?></strong></p>
                <p><?php echo htmlspecialchars($course['description']); ?></p>
                <button class="download">Download</button>
                <button class="share">Share</button>
            </div>
        <?php endforeach; ?>
    </div>
</div>



        </div>

    </div>
</body>

</html>