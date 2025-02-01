<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: login.php");
    exit();
}
include '../../model/instructor/db.php';

$db = new MyDB();
// $conn = $db->open();

$result = $db->getCoursesByInstructorId($_SESSION['instructor_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Portal</title>
    <link rel="stylesheet" href="../../assets/css/instructor/certificates.css">
</head>
<body>
    
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Instructor Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php"><span><img src="../../assets/uploads/instructor/dashboard.svg"  width="18" height="12"></span>Dashboard</a></li>
                    <li><a href="courses.php"><span><img src="../../assets/uploads/instructor/course.svg"  width="18" height="12"></span>Courses</a></li>
                    <li><a href="Student_management.php"><span><img src="../../assets/uploads/instructor/grade.svg"  width="15" height="14"></span>Student Management</a></li>
                    <li><a href="certificates.php"  class="active"><span><img src="../../assets/uploads/instructor/certificate.svg"   width="20" height="15"></span>Certificates</a></li>
                    <li><a href="profile.php"><span><img src="../../assets/uploads/instructor/profile.svg"  width="18" height="12"></span>Profile</a></li> 
                </ul>
            </nav>
            <form action="../../control/instructor/logout_control.php">
                <input type="submit" value="logout" class="logout">
            </form>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
            <h2>Welcome to Certificate page</h2>
                <div class="user-info">
                    <span>
                        <?php echo $_SESSION['full_name'] ?? '' ?>
                    </span>
                    <a href="mailto:">
                        <?php echo $_SESSION['email'] ?? ''?>
                    </a>
                </div>
            </div>

            <!-- Certificate Management Content -->
             <h2>Certificate Management</h2>
             <div class="certificate-management">
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                <div class="certificate-card">
                    <div class="certificate-header">
                        <h3><span><?php echo $_SESSION['full_name'] ?? ''; ?></span></h3>

                    </div>
                    <div class="certificate-details">
                    <p>Course:<?php echo $row['title']; ?></p>
                    <p>Description:<?php echo $row['description']; ?></p>
                        <button class="download-certificate">Issue Certificate</button>
                        <!-- <span class="status issued">Issued</span> -->
                    </div>
                </div>
                <?php
                }
                ?>
            </div>


            
        </div>
    </div>
</body>
</html>
