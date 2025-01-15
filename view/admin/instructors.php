<?php
session_start();
include '../../control/instructors_control.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Approve Instructors</title>
</head>

<body>
    <?php include 'navigation.php' ?>
    <h2>Approve Instructors</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        include '../../model/db.php';

        $db = new Db();

        $conn = $db->open();

        $sql = "SELECT * FROM instructor WHERE status=0";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['instructor_id'] . "</td>
                    <td>" . $row['full_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>
                        <a href='../../control/approve_instructor.php?id=" . $row['instructor_id'] . "'>Approve</a>
                        <a href='../../control/reject_instructor.php?id=" . $row['instructor_id'] . "'>Reject</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>

</html>