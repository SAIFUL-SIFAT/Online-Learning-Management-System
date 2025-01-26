<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
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
    <link rel="stylesheet" href="../../assets/css/instructor/courses.css">
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
            <h2>Welcome to Course page</h2>
            <div class="user-info">
                    <span>
                        <?php echo $_SESSION['full_name'] ?? '' ?>
                    </span>
                    <a href="mailto:">
                        <?php echo $_SESSION['email'] ?? ''?>
                    </a>
                </div>
            </div>


            <!-- course Content -->
            <!-- <h2>Courses</h2> -->
        <div class="courses">
                
                <a href="add_course.php">
            <button type="button" class="add-course">+ Add Course</button>
            </a>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Instructor ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>

                </tr>
                
                <?php

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['course_id'] . "</td>
                            <td>" . $row['instructor_id'] . "</td>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>
                                        <div class='actions'>
                                            <form action='../../control/instructor/delete_course.php'>
                                                <input type='hidden' name='course_id' value='" . $row['course_id'] . "'>
                                                <button type='submit' class='delete'>Delete</button>
                                            </form>
                                        </div>
                            </td>
                        </tr>";
                }
                ?>
            </table>

        </div>
        
    </div>

</div>
    <script type="javascript" src="../../assets/js/instructor/myjs.js"></script>
    
</body>
</html>
