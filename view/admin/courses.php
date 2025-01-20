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
</head>

<body>
    <?php include 'navigation.php' ?>
    <h2>Manage Courses</h2>
    <a href="add_course.php">Add course</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Instructor ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        include '../../model/db.php';

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
                        <a href='../../control/admin/delete_course.php?id=" . $row['instructor_id'] . "'>Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>

</html>