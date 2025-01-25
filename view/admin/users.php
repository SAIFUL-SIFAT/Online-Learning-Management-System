<?php session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Users</title>
    <link rel='stylesheet' href='../../assets/css/admin/global.css'>
    <link rel='stylesheet' href='../../assets/css/admin/view-users.css'>
</head>
<body>
<div class="container">
    <?php include 'navigation.php'; ?>
    <div>

    <h2>Manage Users</h2>
    <div class="search-bar">
        <search>
            <form>
                <input name="search_text" id="search_text" placeholder="Search">
            </form>
        </search>
        <select>
            <option>Student</option>
            <option>Instructor</option>
            <option>Moderator</option>
            <option>Admin</option>
        </select>
    </div>

    <div class="table-container">
    <table>

        <?php
        include '../../model/admin/User.php';

        $rows = Student::getStudents();
        $keys = array_keys($rows[0]);

        echo '<tr>';
        foreach ($keys as $key) {
            echo "<th>" . $key . "</th>";

        }
        echo '</tr>';

        if ($rows) {
            foreach ($rows as $row) {
                echo '<tr>';
                foreach ($row as $k => $v) {
                    echo "<td>" . $v . "</td>";

                }
                echo '</tr>';
                // echo "<td>" . " <a href='../../control/admin/delete_course.php?id=" . urlencode($row[$key[0]]) . "'>Delete</a>" . "</td>";
            }
        }
        ?>
    </table>
    </div>
</div>
</div>
</body>
</html>
