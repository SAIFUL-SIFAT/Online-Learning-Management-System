<?php
session_start();
include 'db.php';
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Course</title>
</head>

<body>
    <?php include 'navigation.php'; ?>
    <h2>Add Course</h2>
    <form action="../../control/courses_control.php" method="post">
        Title: <input type="text" name="title" required><br>
        Description: <textarea name="description"></textarea><br>
        Instructor ID: <input type="number" name="instructor_id" required><br>
        <input type="submit" value="Add Course">
    </form>
    <a href="manage_courses.php">Back to Course List</a>
</body>

</html>