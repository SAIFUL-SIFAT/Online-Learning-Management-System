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
    <title>Add Course</title>
    <link rel='stylesheet' href='../../assets/css/admin/global.css'>
    <link rel='stylesheet' href='../../assets/css/admin/view-addcourse.css'>
</head>

<body>
    <div class="container">
    <?php include 'header.php'; ?>
    <?php include 'navigation.php'; ?>
    <div>
    <h2>Add Course</h2>

    <form action="../../control/admin/add_course_control.php" method="post">
        <table>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" required></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea name="description"></textarea></td>
            </tr>
            <tr>
                <td>Instructor ID:</td>
                <td><input type="number" name="instructor_id" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Add Course"></td>
            </tr>
        </table>
    </form>

    <a class="link-button" id="back-button" href="courses.php">Back to Course List</a>
    </div>
    </div>
</body>

</html>