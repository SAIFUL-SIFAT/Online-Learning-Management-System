
<?php
    session_start();
    if(!isset($_SESSION['full_name'])) {
        header("Location: signin.php");
    }

    include '../../model/moderator/db.php';
    $db = new Db();
    
$result = $db->getCourses();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Portal - Course Management</title>
    <link rel="stylesheet" href="../../assets/css/moderator/course_management.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Moderator Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="content_moderation.php">Content Moderation</a></li>
                    <li><a href="course_management.php" class="active">Course Management</a></li>
                    <li><a href="student_management.php">Student Management</a></li>
                    <li><a href="events.php">Events</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <form action="../../control/moderator/logout_control.php" method="POST" >
                    <button class="logout" type="submit">Logout</button>
                </form>
            </div>
        </div>

        <div class="main">
            <div class="header">

            </div>

            <div class="content-moderation">
                <h2>Content Moderation</h2>
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
                                <form action='../../control/moderator/course_delete_control.php'>
                                  <input type='hidden' name='course_id' value='" . $row['course_id'] . "'>
                                      <button type='submit' class='delete'>Delete</button>
                                </form>
                             </div>
                            </td>
                        </tr>";
                }
                ?>
            </table>
            <a href="add_course.php">
            <button class="add-course">Add Course
            </button>
            </div>
        </div>
    </div>
</body>
</html>
