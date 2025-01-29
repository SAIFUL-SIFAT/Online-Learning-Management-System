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
    <?php include 'header.php'; ?>
    <?php include 'navigation.php'; ?>
    <div>

    <h2>Manage Users</h2>
    <div class="search-bar">
        <search>
            <form id="search-bar-form">
                <input name="search_text" id="search_text" placeholder="Search by Email">
            </form>
        </search>
        <select id="user-type-selector">
            <option>Student</option>
            <option>Instructor</option>
            <option>Moderator</option>
            <option>Admin</option>
        </select>
    </div>

    <div class="table-container">
    <table id="users-table">

        <?php
        include '../../model/admin/User.php';

        $rows = User::getUsers('student');

        if ($rows) {
            $keys = array_keys($rows[0]);

            echo '<tr>';
            foreach ($keys as $key) {
                echo "<th>" . $key . "</th>";
            }
            echo "<th>Action</th>";
            echo '</tr>';

            if ($rows) {
                foreach ($rows as $row) {
                    echo '<tr>';
                    foreach ($row as $k => $v) {
                        echo "<td>" . $v . "</td>";

                    }
                    echo "<td>" . " <a class='link-button' id='user-action' href='../../control/admin/delete_course.php?id=" . urlencode($row[$keys[0]]) . "'><img src='../../assets/uploads/admin/delete-red.png'>Delete</a>" . "</td>";
                    echo '</tr>';
                }
            }
        }
        ?>
    </table>
    </div>
    <div class="bottom-bar-container">
        <div class="page-change-container">
            <input type="image" id="previous-page-button" src="../../assets/uploads/admin/previous.png">
            <input type="image" id="next-page-button" src="../../assets/uploads/admin/next.png">
        </div>
    </div>
</div>
</div>

<script src="../../assets/js/admin/users.js"></script>
</body>
</html>
