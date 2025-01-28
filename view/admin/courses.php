<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Courses</title>
    <link rel='stylesheet' href='../../assets/css/admin/global.css'>
    <link rel='stylesheet' href='../../assets/css/admin/view-courses.css'>
</head>

<body>
<div class="container">
    <?php include 'header.php'; ?>
    <?php include 'navigation.php' ?>
    <div>
        <h2>Manage Courses</h2>
        <a href="add_course.php" class="link-button" id="add-course"><img src='../../assets/uploads/admin/add.png'>Add course</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Instructor ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php
            include '../../model/admin/db.php';

            $db = new Db();

            $conn = $db->open();

            $sql = "SELECT * FROM course";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['course_id'] . "</td>
                        <td>" . $row['instructor_id'] . "</td>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td>
                            <a class='link-button' id='delete-course' href='../../control/admin/delete_course.php?id=" . urlencode($row['course_id']) . "'><img src='../../assets/uploads/admin/delete-red.png'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</div>
</body>

</html>