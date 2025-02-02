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
    <title>Approve Instructors</title>
    <link rel='stylesheet' href='../../assets/css/admin/global.css'>
    <link rel='stylesheet' href='../../assets/css/admin/view-instructors.css'>
</head>

<body>
<div class="container">
    <?php include 'header.php'; ?>
    <?php include 'navigation.php' ?>
    <div>
    <h2>Approve Instructors</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        include '../../model/admin/Instructor.php';

        $offset = 0;
        $limit = 20;
        $rows = Instructor::getUnapproved($offset, $limit);

        foreach ($rows as $row) {
            echo "<tr>
                    <td>" . $row['instructor_id'] . "</td>
                    <td>" . $row['full_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>
                        <a class='link-button' id='approve-instructor' href='../../control/admin/approve_instructor.php?id=" . urlencode($row['instructor_id']) . "'><img src='../../assets/uploads/admin/approve.png'>Approve</a>
                        <a class='link-button' id='reject-instructor' href='../../control/admin/reject_instructor.php?id=" . urlencode($row['instructor_id']) . "'><img src='../../assets/uploads/admin/delete-red.png'>Reject</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    </div>
</div>
</body>

</html>