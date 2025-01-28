<?php
session_start();
if (!isset($_SESSION['full_name'])) {
    header("Location: ..\..\view\student\sign_in.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Course</title>

</head>

<body>
    <div class="container">

        <div>
            <h2>Add Course</h2>

            <form action="..\..\control\student\course_contrrol.php" method="post">
                <table>
                    <tr>
                        <td>Title:</td>
                        <td><input type="text" name="title" ></td>
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
                        <td>Course ID:</td>
                        <td><input type="number" name="course_id" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Add Course"></td>
                    </tr>
                </table>
            </form>


        </div>
    </div>
</body>

</html>