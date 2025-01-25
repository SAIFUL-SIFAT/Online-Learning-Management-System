<?php 
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Portal</title>
    <link rel="stylesheet" href="../../assets/css/instructor/student_management.css">
</head>
<body>
    
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Instructor Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php" ><span><img src="../../assets/uploads/dashboard.svg" alt="Profile Picture"  width="18" height="12"></span>Dashboard</a></li>
                    <li><a href="courses.php"><span><img src="../../assets/uploads/course.svg" alt="Profile Picture"  width="18" height="12"></span>Courses</a></li>
                    <li><a href="Student_management.php" class="active"><span><img src="../../assets/uploads/grade.svg" alt="Profile Picture"  width="15" height="14"></span>Student Management</a></li>
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

            <!-- Student Management Content -->
            <h2>Student Management</h2>
            <div class="student-management-container">
                <form action="../../control/instructor/student_management_control.php" method="POST">
                    <table class="student-management-table">
                        
                            <tr>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>COURSES</th>
                                <th>ACTIONS</th>
                            </tr>
                        
                        <tbody>
                            <!-- Dynamically generated table rows -->
                        </tbody>
                         </table>
                    <div class="actions">
                        <button type="submit" name="action" value="view">View</button>
                        <button type="submit" name="action" value="delete" class="delete">Delete</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</body>
</html>
