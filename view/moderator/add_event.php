<?php
    session_start();
    if(!isset($_SESSION['full_name']) || ($_SESSION['password'] )) {
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
    <link rel="stylesheet" href=".../../assets/css/moderator/add_event.css">
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
                    <li><a href="student_management.php" >Student Management</a></li>
                    <li><a href="events.php"class="active">Events</a></li>
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
            <div class="add-event">
                <h2>Add student</h2>
                <form action="../../control/add_event_control.php" method="POST">
                    <tr>
                        <td><label for="title">Title:</label></td>
                        <td><input type="text" id="title" name="title"></td>
                    </tr>
                    <tr>
                        <td><label for="description">Description:</label></td>
                        <td><input type="text" id="description" name="description"></td>
                    </tr>
                    <tr>
                        <td><label for="moderator_id">Moderator ID:</label></td>
                        <td><input type="text" id="moderator_id" name="moderator_id"></td>
                    </tr>
                    <tr>
                        <td><label for="event_date">Event Date:</label></td>
                        <td><input type="date" id="event_date" name="event_date"></td>
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
