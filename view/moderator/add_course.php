<?php
    session_start();
    if(!isset($_SESSION['full_name']) ) {
        header("Location: signin.php");
    }
    include '../../model/moderator/db.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Portal - Student Management</title>
    <link rel="stylesheet" href="../../assets/css/moderator/add_course.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Moderator Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="content_moderation.php">Content Moderation</a></li>
                    <li><a href="course_management.php"class="active">Course Management</a></li>
                    <li><a href="student_management.php" >Student Management</a></li>
                    <li><a href="events.php">Events</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <form action="../../control/moderator/logout_control.php" method="POST" >
                    <button class="logout" type="submit">Logout</button>
                </form>
            </div>

        </div>

        <div class="main-content">
            <div class="header">

            </div>

            <div class="add-course">
                <h2>Add student</h2>
                <form action="../../control/moderator/add_course_control.php" method="POST">
                    <tr>
                        <td><label for="course_name">Instructor ID:</label></td>
                        <td><input type="text" id="course_name" name="instructor_id"></td>
                    </tr>
                    <tr>
                        <td><label for="course_description">Title:</label></td>
                        <td><input type="text" id="course_description" name="title"></td>
                    </tr>
                    <tr>
                        <td><label for="course_instructor">Description:</label></td>
                        <td><input type="text" id="course_instructor" name="description"></td>
                    </tr>
                    
                    <tr>
                        <td><input type="submit" value="Add"></td>
                    </tr>
                </form>
                
                
                
            </div>
        </div>
    </div>
</body>
</html>
