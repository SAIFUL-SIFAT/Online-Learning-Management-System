<?php 
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
    exit();
}
include '../../control/instructor/course_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Portal</title>
    <link rel="stylesheet" href="../../assets/css/instructor/add_course.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Instructor Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php"><span><img src="../../assets/uploads/dashboard.svg" alt="Profile Picture"  width="18" height="12"></span>Dashboard</a></li>
                    <li><a href="courses.php"class="active"><span><img src="../../assets/uploads/course.svg" alt="Profile Picture"  width="18" height="12"></span>Courses</a></li>
                    <li><a href="Student_management.php"><span><img src="../../assets/uploads/grade.svg" alt="Profile Picture"  width="15" height="14"></span>Student Management</a></li>
                    <li><a href="certificates.php"><span><img src="../../assets/uploads/certificate.svg" alt="Profile Picture"  width="20" height="15"></span>Certificates</a></li>
                    <li><a href="profile.php"><span><img src="../../assets/uploads/profile.svg" alt="Profile Picture"  width="18" height="12"></span>Profile</a></li>
                </ul>
            </nav>
            <form action="../../control/instructor/logout_control.php">
                <input type="submit" value="logout" class="logout">
            </form>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <input type="text" placeholder="Search..." class="search-bar">
                <div class="user-info">
                    <span>
                        <?php echo $_SESSION['full_name'] ?? '' ?>
                    </span>
                    <a href="mailto:">
                        <?php echo $_SESSION['email'] ?? ''?>
                    </a>
                </div>
            </div>


            <!-- add course Content -->
        <form class="add_courses" action="../../control/instructor/add_course_control.php" method="post">
            <div class="course-modal">
                <h3>Create New Course</h3>
                <label for="instructor_id">Instructor ID</label>
                <input type="number" id="instructor_id" name="instructor_id" required>

                <label for="course-title">Course Title:</label>
                <input type="text" id="course-title" name="title" required>

                <label for="course-description">Description:</label>
                <textarea id="course-description" name="description" required></textarea>

                <div class="buttons">
                    <button type="submit" class="create-course">Create Course</button>
                    <button type="button" class="close-modal">Cancel</button>
                </div>
            </div>
            </form>


        </div>
    </div>
    <!-- <script type="javascript" src="../../assets/js/instructor/myjs.js"></script> -->
</body>
</html>
