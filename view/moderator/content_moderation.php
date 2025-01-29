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
    <link rel="stylesheet" href="../../assets/css/moderator/content_moderation.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Moderator Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="content_moderation.php" class="active">Content Moderation</a></li>
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
        <div class="main-content">
            <div class="header">
                
            </div>

            <!-- Content Moderation -->
            <div class="content-moderation">
                <h2>Content Moderation</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Reason</th>
                            <th>Author</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Introduction to Python</td>
                            <td>Course</td>
                            <td class="flagged">Flagged</td>
                            <td>Inappropriate Content</td>
                            <td>Dr. Smith</td>
                            <td>
                                <button class="approve">Approve</button>
                                <button class="reject">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Web Development Basics</td>
                            <td>Course</td>
                            <td class="pending">Pending</td>
                            <td>Copyright Check</td>
                            <td>Jane Doe</td>
                            <td>
                                <button class="approve">Approve</button>
                                <button class="reject">Reject</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Data Science Forum</td>
                            <td>Discussion</td>
                            <td class="approved">Approved</td>
                            <td>-</td>
                            <td>Community</td>
                            <td>
                                <button class="approve">Approve</button>
                                <button class="reject">Reject</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
