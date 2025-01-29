<?php
    session_start();
    if(!isset($_SESSION['full_name'])) {
        header("Location: signin.php");
    }
    include '../../model/moderator/db.php';

// $db = new Db();
// $conn = $db->open();

// $result = $db->getAllStudents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Portal - Student Management</title>
    <link rel="stylesheet" href="../../assets/css/moderator/add_student.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Moderator Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="content_moderation.php">Content Moderation</a></li>
                    <li><a href="course_management.php">Course Management</a></li>
                    <li><a href="student_management.php" class="active">Student Management</a></li>
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

            <!-- Student Management -->
            <div class="add-student">
                <h2>Add student</h2>
                <form action="../../control/add_student_control.php" method="POST">
                    <tr>
                        <td><label for="full_name">Full Name:</label></td>
                        <td><input type="text" id="full_name" name="full_name"></td>
                    </tr>
                    <tr>
                        <td><label for="last_name">Last Name:</label></td>
                        <td><input type="text" id="last_name" name="last_name"></td>    
                    </tr>
                    <tr>
                        <td><label for="email">Email:</label></td>
                        <td><input type="email" id="email" name="email"></td>
                    </tr>
                    <tr>
                        <td><label for="phone">Phone:</label></td>
                        <td><input type="text" id="phone" name="phone"></td>
                    </tr>

                    <tr>
                        <td><label for="country">Country:</label></td>
                        <td><input type="text" id="country" name="country"></td>
                    </tr>
                    <tr>
                        <td><label for="preferred_language">Preferred Language:</label></td>
                        <td><input type="text" id="preferred_language" name="preferred_language"></td>
                    </tr>   
                    <tr>
                        <td><input type="submit" value="Add"></td>
                    </tr>
                </form>
                
                
                    <!-- <button class="add-student">Add</button> -->
                
            </div>
        </div>
    </div>
</body>
</html>
