<?php
    session_start();
    if(!isset($_SESSION['full_name'])) {
        header("Location: signin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Portal</title>
    <link rel="stylesheet" href="../../assets/css/moderator/dashboard.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Moderator Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php" class="active">Dashboard</a></li>
                    <li><a href="content_moderation.php">Content Moderation</a></li>
                    <li><a href="course_management.php">Course Management</a></li>
                    <li><a href="student_management.php">Student Management</a></li>
                    <li><a href="events.php">Events</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <form action="../../control/logout_control.php" method="POST" >
                    <button class="logout" type="submit">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main">
            <!-- Header -->
            <div class="header">
                
                
            </div>

            <!-- Dashboard Content -->
            <div class="dashboard">
                <h2>Dashboard</h2>
                <div class="content-cards">
                    <div class="card">
                        <h3>Content Moderation</h3>
                        <p>Review and moderate user-generated content.</p>
                        <a href="content_moderation.php" class="btn">Go to Content Moderation</a>
                    </div>
                    <div class="card">
                        <h3>Course Management</h3>
                        <p>Manage course content and settings.</p>
                        <a href="course_management.php" class="btn">Go to Course Management</a>
                    </div>
                    <div class="card">
                        <h3>Student Management</h3>
                        <p>Manage student accounts and progress.</p>
                        <a href="student_management.php" class="btn">Go to Student Management</a>
                    </div>
                    <div class="card">
                        <h3>Events</h3>
                        <p>View and manage upcoming events.</p>
                        <a href="events.php" class="btn">Go to Events</a>
                    </div>
                    <div class="card">
                        <h3>Discounts</h3>
                        <p>Manage discount codes and offers.</p>
                        <a href="discounts.php" class="btn">Go to Discounts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
