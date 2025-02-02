<?php
    session_start();
    if(!isset($_SESSION['full_name']) ) {
        header("Location: signin.php");
    }
    include '../../model/moderator/db.php';

$db = new Db();
// $conn = $db->open();

$result = $db->getAllStudents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Portal - Student Management</title>
    <link rel="stylesheet" href="../../assets/css/moderator/student_management.css">
</head>
<body>
    <div class="container">
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

        <div class="main-content">
            <div class="header">

            </div>

            <div class="student-management">
                <h2>Student Management</h2>
                <table>
                    <tr>
                        <th>Student Id</th>
                        <th>Full Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Preferred Language</th>
                        <th>Action</th>
                     </tr>
                     <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['student_id'] . "</td>
                                    <td>" . $row['full_name'] . "</td>
                                    <td>" . $row['last_name'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['phone'] . "</td>
                                    <td>" . $row['country'] . "</td>
                                    <td>" . $row['preferred_language'] . "</td>
                                    <td>
                                        <div class='actions'>
                                            <form action='../../control/student_delete_control.php'>
                                                <input type='hidden' name='student_id' value='" . $row['student_id'] . "'>
                                                <button type='submit' class='delete'>Delete</button>
                                            </form>
                                        </div>
                                     </td>

                                </tr>";
                        }
                    } 
                ?>
                </table>
                <a href="add_student.php">
                    <button class="add-student">Add Student</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
