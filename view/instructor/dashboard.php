<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
    exit();
}
include '../../model/instructor/db.php';
$db= new MyDB();
$conn = $db->openConn();


// Get the total number of courses
$sql = "SELECT COUNT(*) AS total_courses FROM course WHERE instructor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['instructor_id']);
$stmt->execute();
$result = $stmt->get_result();
$total_courses = $result->fetch_assoc()['total_courses'];

$sql = "SELECT COUNT(*) AS total_students FROM student ";
$stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $_SESSION['instructor_id']);
$stmt->execute();
$result = $stmt->get_result();
$total_students = $result->fetch_assoc()['total_students'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Portal</title>
    <link rel="stylesheet" href="../../assets/css/instructor/dashboard.css">
</head>
<body>
    
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Instructor Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php" class="active"><span><img src="../../assets/uploads/dashboard.svg" alt="Profile Picture"  width="18" height="12"></span>Dashboard</a></li>
                    <li><a href="courses.php"><span><img src="../../assets/uploads/course.svg" alt="Profile Picture"  width="18" height="12"></span>Courses</a></li>
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
            <!-- Header -->
            <div class="header">
                <h2>Welcome to Dashboard</h2>
                <div class="user-info">
                    <span>
                        <?php echo $_SESSION['full_name'] ?? '' ?>
                    </span>
                    <a href="mailto:">
                        <?php echo $_SESSION['email'] ?? ''?>
                    </a>
                </div>
        </div>

            <!-- Dashboard Content -->
            <!-- <h2>Dashboard</h2> -->
            <div class="dashboard">
                <h2>Dashboard</h2>
                <div class="dashboard-stats">
                    <div class="stat">
                        <h3>Total Courses</h3>
                        <p><?php echo $total_courses; ?></p>
                    </div>
                    <div class="stat">
                        <h3>Total Students</h3>
                        <p><?php echo $total_students; ?></p>
                    </div>
                    <div class="stat">
                        <h3>Total Certificates</h3>
                        <p><?php echo $total_courses; ?></p>
                    </div>

                 
                </div>
                <!-- Other dashboard content -->
            </div>
        </div>
    </div>
</body>
</html>
