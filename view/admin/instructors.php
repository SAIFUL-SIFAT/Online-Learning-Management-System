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
</head>

<body>
<div class="container">
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
        include '../../model/admin/db.php';

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
                        <a href='../../control/admin/approve_instructor.php?id=" . urlencode($row['instructor_id']) . "'>Approve</a>
                        <a href='../../control/admin/reject_instructor.php?id=" . urlencode($row['instructor_id']) . "'>Reject</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    </div>
</div>
</body>

</html>