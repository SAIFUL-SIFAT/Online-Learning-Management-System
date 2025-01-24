<?php 
session_start();
if (!isset($_SESSION['full_name'])) {
    header('location: login.php');
}
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
                    <li><a href="dashboard.php"><span><img src="../../assets/uploads/dashboard.svg" alt="Profile Picture"  width="18" height="12"></span>Dashboard</a></li>
                    <li><a href="courses.php"><span><img src="../../assets/uploads/course.svg" alt="Profile Picture"  width="18" height="12"></span>Courses</a></li>
                    <li><a href="grades.php"><span><img src="../../assets/uploads/grade.svg" alt="Profile Picture"  width="15" height="14"></span>Grades</a></li>
                    <li><a href="certificates.php"  class="active"><span><img src="../../assets/uploads/certificate.svg" alt="Profile Picture"  width="20" height="15"></span>Certificates</a></li>
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

            <!-- Certificate Management Content -->
             <h2>Certificate Management</h2>
            <div class="certificate-management">
                <div class="certificate-card">
                    <div class="certificate-header">
                        <h3><span> <?php echo $_SESSION['full_name'] ?? '' ?></span></h3>
                        <p>Web Development Fundamentals</p>
                    </div>
                    <div class="certificate-details">
                        <button class="download-certificate">Download Certificate</button>
                        <span class="status issued">Issued</span>
                    </div>
                </div>

                <div class="certificate-card">
                    <div class="certificate-header">
                        <h3><span> <?php echo $_SESSION['full_name'] ?? '' ?></span></h3>
                        <p>Advanced React Patterns</p>
                    </div>
                    <div class="certificate-details">
                        <button class="issue-certificate">Issue Certificate</button>
                        <span class="status pending">Pending</span>
                    </div>
                </div>
            </div>


            
        </div>
    </div>
</body>
</html>
