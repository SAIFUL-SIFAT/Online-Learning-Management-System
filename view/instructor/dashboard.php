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
                    <li><a href="grades.php"><span><img src="../../assets/uploads/grade.svg" alt="Profile Picture"  width="15" height="14"></span>Grades</a></li>
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

            <!-- Dashboard Content -->
            <h2>Dashboard</h2>
            <div class="dashboard">
                <div class="stats">
                    <div class="stat">
                        
                    </div>
                    <div class="stat">
                        
                    </div>
                    <div class="stat">
                        
                    </div>
                    <div class="stat">
                        
                    </div>
                </div>

                <!-- Recent Activity and Events -->
                <div class="activity-events">
                    <div class="recent-activity">
                        <h3>Recent Activity</h3>
                        <ul>
                            <li>New Course: Advanced JavaScript</li>
                            <li>Grade Updated: Web Development Basics</li>
                            <li>Certificate Issued: React Fundamentals</li>
                            <li>New Student: Emily Johnson enrolled</li>
                        </ul>
                    </div>
                    <div class="upcoming-events">
                        <h3>Upcoming Events</h3>
                        <ul>
                            <li>Course Review Meeting - Today, 2:00 PM</li>
                            <li>New Course Launch - Tomorrow, 10:00 AM</li>
                            <li>Student Orientation - Sep 25, 11:00 AM</li>
                            <li>End of Term Assessment - Sep 30, 9:00 AM</li>
                        </ul>
                    </div>
                </div>

                <!-- Course Progress Overview -->
                <div class="course-progress">
                    <h3>Course Progress Overview</h3>
                    <div class="progress">
                        <p>Web Development Fundamentals</p>
                        
                    </div>
                    <div class="progress">
                        <p>Advanced React Patterns</p>
                        
                    </div>
                    <div class="progress">
                        <p>UI/UX Design Principles</p>
                        <!-- <progress value="45" max="100"></progress> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
